var microphone = document.getElementById('microphone');
var camera = document.getElementById('camera');
var phone = document.getElementById('phone');
var vid= document.getElementById('self');
//var recording = document.getElementById('recording');
let isMicrophone = true;
let iscamera = true;
//let isRecording = false;
var screenshare = document.getElementById('screenshare');
const switchOfMicrophone = () => {
  isMicrophone = false;
  microphone.classList.replace("fa-microphone", "fa-microphone-slash");
  vid.muted=true;
}
const switchOnMicrophone = () => {
  isMicrophone = true;
  microphone.classList.replace("fa-microphone-slash", "fa-microphone");
  vid.muted=false;
}
microphone.addEventListener("click", () => {
  if (isMicrophone) {
    switchOfMicrophone();
  }
  else {
    switchOnMicrophone();
  }
})
const switchOffCamera = () => {
  iscamera = false;
  camera.classList.replace("fa-video-camera", "fa-video-slash");
  vid.pause();
}
const switchOnCamera = () => {
  iscamera = true;
  camera.classList.replace("fa-video-slash", "fa-video-camera");
  vid.play();
}
camera.addEventListener("click", () => {
  if (iscamera) {
    switchOffCamera();
  }
  else {
    switchOnCamera();
  }
})

let constraintObj = {
  audio: true,
  video: {
    facingMode: "user",
    width: { min: 200, ideal: 200 , max: 1920 },
    height: { min: 150, ideal: 7, max: 1080 }
  }
};

if (navigator.mediaDevices === undefined) {
  navigator.mediaDevices = {};
  navigator.mediaDevices.getUserMedia = function (constraintObj) {
    let getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
    if (!getUserMedia) {
      return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
    }
    return new Promise(function (resolve, reject) {
      getUserMedia.call(navigator, constraintObj, resolve, reject);
    });
  }
} else {
  navigator.mediaDevices.enumerateDevices()
    .then(devices => {
      devices.forEach(device => {
        console.log(device.kind.toUpperCase(), device.label);
        //, device.deviceId
      })
    })
    .catch(err => {
      console.log(err.name, err.message);
    })
}

navigator.mediaDevices.getUserMedia(constraintObj)
  .then(function (mediaStreamObj) {
    //connect the media stream to the first video element
    let video = document.querySelector('video');
    if ("srcObject" in video) {
      video.srcObject = mediaStreamObj;
    } else {
      //old version
      video.src = window.URL.createObjectURL(mediaStreamObj);
    }

    video.onloadedmetadata = function (ev) {
      //show in the video element what is being captured by the webcam
      video.play();
    };

    //add listeners for saving video/audio
    let start = document.getElementById('btnStart');
    let stop = document.getElementById('btnStop');
    let vidSave = document.getElementById('vid2');
    let mediaRecorder = new MediaRecorder(mediaStreamObj);
    let chunks = [];

    start.addEventListener('click', (ev) => {
      mediaRecorder.start();
      console.log(mediaRecorder.state);
      start.style.display="none";
      stop.style.display="inline";
    })
    stop.addEventListener('click', (ev) => {
      mediaRecorder.stop();
      console.log(mediaRecorder.state);
      start.style.display="inline";
      stop.style.display="none";
    });
    mediaRecorder.ondataavailable = function (ev) {
      chunks.push(ev.data);
    }
    download=document.getElementById('download');
    mediaRecorder.onstop = (ev) => {
      let blob = new Blob(chunks, { 'type': 'video/mp4;' });
      chunks = [];
      let videoURL = window.URL.createObjectURL(blob);
      vidSave.src = videoURL;
      download.href=videoURL;
      download.click();
      
    }
  })
  .catch(function (err) {
    console.log(err.name, err.message);
  });







