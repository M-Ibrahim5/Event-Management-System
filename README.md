
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

8. **Solve Error**
   If you have some error, please refer to error-guide.txt for solution.
   
   ---
   
   ## Here are some screenshot of the project
### A. Atendee
1. **Login & Register**
![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/2482f0fd-4dcc-44f0-b276-1317b28d9042)

![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/362d1d6c-9454-4273-9c82-fd1f54948709)


2. **Homepage**

![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/c6f2202e-d2ba-4dcf-b5c1-7ee481b193c2)

3. **Category Page**

![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/4f4f3de7-52e9-4679-b956-b0f18be154fe)

4. **Search Result Page**

![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/0ad8e8d3-3645-41ad-9fb9-f8d29fbd8292)

5. **Event Details Page**

![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/2a74c74e-b76b-46b6-845f-4563c77a446a)

6. **Payment Page**

![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/21b46c05-f313-4629-bf17-70d89d091d0e)

7. **Favourite List Page**
    ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/172597d1-76d0-4a93-ac5f-7249ebee5c7f)

---

### B. Organizer
1. **Homepage**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/f51ea3c9-d984-41f7-aac7-e6db512e62fc)

2. **Manage Event Page**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/6c58f2c7-35e0-4cf6-af73-a3923a3a0ecf)

3. **Create Event**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/0c2c0b62-1498-4d03-8ad9-b26b0a48a868)

4. **Edit Event**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/523c1f47-656e-4304-89a2-15f162bf3c04)

5. **Event Report Page**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/b9c5c278-a955-4688-97ac-7dd4f9bd962a)

---

### C. Admin
1. **HomePage**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/0b415f4e-408c-4812-8c5b-abf608cbde03)

2. **Event Requests Page**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/39f47258-7310-40e1-8861-4c4c27809782)

3. **Manage Events Page**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/5aa235ef-b264-4258-b888-ea5a6d0305ab)

4. **Manage Sponsorship**
![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/d99739f1-c80e-4a98-abba-e6fd5e27fd3d)
![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/01e41d4e-b205-4203-bf7e-a6fd3b0c01ae)

5. **Manage Sponsorship Request**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/055fd207-3cd0-4062-b5d0-725ab895321e)

6. **Manage Accounts Page**
   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/de06ade8-4b6d-4196-96ca-65f4b6c29878)
