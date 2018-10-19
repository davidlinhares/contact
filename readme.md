# CONTACT APP

A simple application for a user's contact list using Laravel as it's core API and VUE.js as it's front-end.

> Built using

* [Laravel](https://laravel.com/docs/5.7) - Framework used to build the API and serve the application
* [Vue.js](https://vuejs.org/v2/guide/) - Front-end framework used to create SPA
* [NPM](https://www.npmjs.com/) - Package manager

> Database Structure
```
MySQL Database
Edit application .env file with the database details
```
> API URLs
```
GET::application.url/api/contacts -> retrieve a detailed list paginated for the contacts
GET::application.url/api/contact/contact_id -> retrieve details from a specific contact
POST::application.url/api/contact -> create a new contact and store it on database
PUT::application.url/api/contact -> updates the contact object
DELETE::application.url/api/contact/contact_id -> delete a specific contact from the database
```
> License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)
This project uses MIT License, view project license for details.

# Version

v0.9
