# Matcha

> A dating website

> An app allowing two potential lovers to meet, from the registration to the final encounter.

> A user will then be able to register, connect, fill his/her profile, search and look into the profile of other users, like them 1, chat with those that “liked” back.

**Badges**

- Build
- Issues
- Forks
- Stars
- Licence

[![Build Status](http://img.shields.io/travis/badges/badgerbadgerbadger.svg?style=flat-square)](https://travis-ci.org/badges/badgerbadgerbadger)
<a href="https://github.com/The-only-blue/matcha/issues"><img alt="GitHub issues" src="https://img.shields.io/github/issues/The-only-blue/Camagru"></a>
<a href="https://github.com/The-only-blue/matcha/network"><img alt="GitHub forks" src="https://img.shields.io/github/forks/The-only-blue/Camagru"></a>
<a href="https://github.com/The-only-blue/matcha/stargazers"><img alt="GitHub stars" src="https://img.shields.io/github/stars/The-only-blue/Camagru"></a>
<a href="https://github.com/The-only-blue/matcha"><img alt="GitHub license" src="https://img.shields.io/github/license/The-only-blue/Camagru"></a>


---
## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Testing](#testing)
- [Security](#security)
- [FAQ](#faq)
---

## Requirements

- Have `XAMPP` or `MAMP` installed.
- PHP 7.0 or above.
- Apache 2 or above.

## Installation

- Clone the repo
- Place the `matcha` directory in the `htdocs` directory of the `MAMP` or `XAMPP` application.
- Run the `XAMPP` or `MAMP` you can edit the port number but the defualt port is usually `80` or `8080`.
- To build the database run the setup.php file. => http://localhost:8080/matcha/config/setup.php (Replace the 8080 with the port number on your XAMMP or MAMP Application)
- Then run http://localhost:8080/matcha/ to open access the site. (Replace the 8080 with the port number on your XAMMP or MAMP Application)

## Security

- Does not Store plain or unencrypted passwords in the database.
- Does not Offer the ability to inject HTML or “user” JavaScript in badly protected variables.
- Does not Offer the ability to upload unwanted content on the server.
- Does not Offer the possibility of altering an SQL query. (Sql Injections) 
- Does not Use an extern form to manipulate so-called private data

---
## Testing


**Login And Registration**

- [x] User must be able to sign up, by providing at least an email, a username and a password (secured, a usual current word must not be accepted as a password for instance).

- [x] Subscription must be completed by a confirmation email.

- [x] User must be able to connect using they username and must be able to receive an email to reset his password on demand.

- [x] User disconnection must be possible from anywhere on the site.

- [x] The main page must have a decent presentation : at least a header, a main section and a footer.

**User profile**

- [x] Once connected, a user must fill his or her profile, adding the following information:
  - [x] The gender.
  - [x] Sexual preferences.
  - [x] A biography.
  - [x] A list of interests with tags (ex: #vegan, #geek, #piercing etc...). These tags must be reusable.
  - [x] Pictures, max 5, including 1 as profile picture.

- [x] At any time, the user must be able to modify these information, as well as the last name, first name and email address.

- [x] The user must be able to check who looked at his/her profile as well as who “liked” him/her.

- [x] The user must have a public “fame rating”

- [x] The user must be located using GPS positionning, up to his/her neighborhood. If the user does not want to be positionned, you must find a way to locate him/her even without his/her knowledge.2 The user must be able to modify his/her GPS position in his/her profile.

**Browsing**

- [x] You will only propose “interesting” profiles for example, only men for a heterosexual girls. You must manage bisexuality. If the orientation isn’t specified, the user will be considered bi-sexual.

- [x] You must cleverly match3 profiles:
  - [x] Same geographic area as the user.
  - [x] With a maximum of common tags.
  - [x] With a maximum “fame rating”.

- [x] You must show in priority people from the same geographical area.

- [x] The list must be sortable by age, localization, “fame rating” and common tags

- [x] The list must be filterable by age, localization, “fame rating” and common tags

**Research**

- [x] The user must be able to run an advanced research selecting one or a few criterias such as:
  - [x] A age gap.
  - [x] A “fame rating” gap.
  - [x] A location.
  - [x] One or multiple interests tags.

**Profile of other users**

- [x] A user must be able to consult the profile of other users. Profiles must contain all the information available about them, except for the email address and the password. When a user consults a profile, it must appear in his/her visit history. The user must also be able to:
  - [x] If he has at least one picture “like” another user. When two people “like” each other, we will say that they are “connected” and are now able to chat. If the current user does not have a picture, he/she cannot complete this action.
  - [x] Check the “fame rating”.
  - [x] See if the user is online, and if not see the date and time of the last connection.
  - [x] Report the user as a “fake account”
  - [x] Block the user. A blocked user won’t appear anymore in the research results and won’t generate additional notifications.
  
**Chat**

- [x] When two users are connected,4 they must be able to “chat” in real time.5 How you will implement the chat is totally up to you. The user must be able to see from any page if a new message is received.
 
 **Notifications**

- [x] A user must be notified in real time6 of the following events:
  - [x] The user received a “like”.
  - [x] The user’s profile has been checked.
  - [x] The user received a message.
  - [x] A “liked” user “liked” back.
  - [x] A connected user “unliked” you.

 ---
## FAQ

- How do I change the port of the XAMMP or MAMP application 
    - XAMPP: https://stackoverflow.com/questions/11294812/how-to-change-xampp-apache-server-port
    - MAMP: https://documentation.mamp.info/en/MAMP-Mac/Preferences/Ports/
