import axios from 'axios';

const instance = axios.create({
  baseURL:'http://phpstack-742041-3320223.cloudwaysapps.com/',
  withCredentials: false,
  headers: {
    'Access-Control-Allow-Origin' : '*',
    'Access-Control-Allow-Methods':'GET,PUT,POST,DELETE,PATCH,OPTIONS',
    'Content-Type': 'application/json',
  }
});

export default instance;