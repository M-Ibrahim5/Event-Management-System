
# EventHub: Event Management System

## Introduction

Welcome to EventHub, a comprehensive event management solution developed using the Laravel framework. EventHub aims to streamline the event management process by providing a user-friendly platform for three main user types: end users, event organisers, and administrators. The system incorporates CRUD functionality and supports various features to enhance the overall event experience.

### User Features

- Users can easily create accounts or log in to access personalized features.
- Search for events based on keywords, location, category, and date.
- View detailed information about events, including descriptions, ticket prices, and organizer details.
- Add events to their favorite cart for quick access and future reference.
- Make seamless ticket purchases with support for multiple payment methods.

### Organiser Features

- Event organisers can register or log in to manage their events efficiently.
- Create, update, and delete events, ensuring up-to-date information is available.
- Apply for sponsorships and view the list of sponsors associated with their events.
- Access detailed event reports, including sales, ticket statistics, number of attendees, and post-event analysis.

### Admin Features

- Administrators have secure access to manage user and organiser accounts.
- Add, edit, or delete user and organiser accounts to maintain the integrity of the system.
- Approve or reject event requests submitted by organisers.
- View, add, edit, and delete sponsorships from the system.
- Access comprehensive event reports to monitor the system's performance.

## Problem Statement

The current event management landscape lacks a unified platform that caters to the needs of end users, event organisers, and administrators. Existing systems often lack seamless integration, creating inefficiencies in event planning and execution. Constraints include the need for a user-friendly interface, efficient event approval processes, and comprehensive reporting functionalities. EventHub aims to address these challenges by providing a robust, integrated solution that enhances user experience and simplifies event management.

## Objectives

1. Develop a user-friendly web application for event management using Laravel, prioritising an intuitive interface for both end users and event organisers.
2. Integrate CRUD functionality for event management, allowing organisers and admin to easily create, update, and delete events.
3. Enhance the event management process with comprehensive API features, including database, payment gateway, and seamless user interactions.

## Use Case Diagram
![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/7e04123a-ee9b-409b-a8e0-456634ae77c5)

## Entity Relationship Diagram
![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/a912da9a-ca90-48a6-ad01-314fd0f52f1c)

---

## How to Run 

1. **Clone the Repository:**  
   Clone the EventHub repository from GitHub to your local machine using the following command:
   ```
   git clone https://github.com/your-username/EventHub.git
   ```

2. **Install Dependencies:**  
   Navigate into the project directory and install the required dependencies using Composer:
   ```
   cd EventHub
   composer install
   ```

3. **Environment Configuration:**  
   Create a copy of the `.env.example` file and rename it to `.env`. Update the necessary configuration details such as database settings and application key:
   ```
   cp .env.example .env
   php artisan key:generate
   ```

4. **Create Database:**  
   Open phpMyAdmin in your web browser and create a new database named `eventhub5`.

5. **Database Migration:**  
   Run the database migrations to create the necessary tables in your configured database:
   ```
   php artisan migrate
   ```

6. **Serve the Application:**  
   Finally, serve the application using the following command:
   ```
   php artisan serve
   ```

7. **Access the Application:**  
   Once the application is served, you can access EventHub by visiting `http://localhost:8000` in your web browser.
