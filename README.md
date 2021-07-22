# Hiring Made Easy

## Introduction

Hiring made easy is an attempt by us to make technical interviews easier. A mid of this
pandemic it’s becoming extremely difficult for companies to connect to candidates for a
technical interview. The tools present online are not free cost around $400 for 100 meetings
with not much feature. Here at HME, we provide a free platform where anyone can conduct
technical interviews and have full control over the entire interview.

Interviewer can set the question and invite the candidate by just sharing the channel ID. The
candidate joins in and can chat via video and voice call. The technical part can be handled by
the collaborative text editor we’ve provided the candidate with.

## The Dashboard

There are 2 dashboards:
### 1. Admin Dashboard

In the admin dashboard, the interviewer gets the option to make a meeting, join a meeting and
look for the meetings that he/she has attended. Personal Info can also be viewed.
<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/3.jpeg" style = "width : 50%; height : auto">

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/4.jpeg">

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/6.jpeg">

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/7.jpeg">

### 2. Candidate Dashboard

This is an overview of the candidate dashboard, the candidate has one less option, i.e the option to
create a meeting has been removed, a candidate can only join meetings and give interviews, apart
from this, all the features are also available for 
<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/10.jpeg">

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/11.jpeg">

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/8.jpeg">

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/9.jpeg">

## Creating a meeting

Follow the steps to create a new meeting
1. Login to the admin panel
2. Click on the create meeting. 
3. Enter meeting title and the problem statement you want to test the candidate on. 
4. Click on create meeting
As soon as you complete the 4 steps, a request is send to the Redis server, a random roon is
cretaed for the next one hour and you’ll be redirected to that particulat room

#### The code editor provided is also realtime and is collaborative made using websockets

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/4.jpeg">

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/5.png">

## Joining a meeting

1. Ask for the room id from your interviewer
2. Login to your candidate panel
3. Click on join meeting
4. Enter the room Id you got from your interviewer
5. Click on join
6. If the room Id is valid, you’ll be redirected to the room


<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/5.png">

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/11.jpeg">

## The Interview Page

This is the interview page wherew the technical interview can be held. There are 2 main component to this page

<img src = "https://github.com/its-amit-kumar/hiring-made-easy/blob/main/pics/5.png">

### 1. The Collaborarive text Editor –
This editor is made on the web-socket technology, each time the candidate types something, it can
be very well seen byt the interviewer and even the interviewer can make changes to the code. Only the appended code is transfered, hence making the code editor very efficient on the internet. 

### 2. The video and Audio call –
The candidate’s face will v=be visible in the small white box that can be seen, this gives the
interviewer and the candidate to chat and get to know each other. The div is fully movable, so you
can place it at any part of the page according to





