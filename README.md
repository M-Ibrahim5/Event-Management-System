
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

## Technologies Used

EventHub is built using the following technologies and frameworks:

- **Laravel:** The backend of EventHub is developed using the Laravel PHP framework.
- **Blade Templating Engine:** Laravel Blade is used for the frontend views, providing a powerful templating engine for generating HTML.
- **MySQL:** EventHub utilizes MySQL as the relational database management system for storing data.

---

## How to Run 

1. **Clone the Repository:**  
   Clone the EventHub repository from GitHub to your local machine using the following command:
   ```
   git clone https://github.com/M-Ibrahim5/Event-Management-System.git
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

<img width="476" height="503" alt="image" src="https://github.com/user-attachments/assets/3cf74fe8-85e9-4d1f-8df7-d7337711eb41" />

<img width="393" height="503" alt="image" src="https://github.com/user-attachments/assets/0d80f288-94f9-43b8-906a-8404287ab3b1" />


2. **Homepage**

<img width="1294" height="1167" alt="image" src="https://github.com/user-attachments/assets/eb878b7a-ba5e-4e75-a08e-0676562bc715" />

3. Event Details Page**

<img width="1126" height="1007" alt="image" src="https://github.com/user-attachments/assets/6112014c-41a3-4591-90bd-a541160178d6" />


6. **Payment Page**

   ![image](https://github.com/M-Ibrahim5/Event-Management-System/assets/93575112/21b46c05-f313-4629-bf17-70d89d091d0e)

7. **Favourite List Page**

<img width="1306" height="485" alt="image" src="https://github.com/user-attachments/assets/f4068943-640d-464e-b7d8-1c5758d54516" />

---

### B. Organizer
1. **Homepage**
<img width="1461" height="597" alt="image" src="https://github.com/user-attachments/assets/b97f7d55-b2b6-4f12-a12d-a1ec2aed688e" />

2. **Manage Event Page**

<img width="902" height="301" alt="image" src="https://github.com/user-attachments/assets/e59e4b1b-b39f-40d2-9d28-b0c660b0b659" />


3. **Create Event**
<img width="1026" height="1013" alt="image" src="https://github.com/user-attachments/assets/76b9bb81-7a08-44d2-9fad-40c6d158177a" />


4. **Edit Event**
  <img width="946" height="594" alt="image" src="https://github.com/user-attachments/assets/1f707972-698b-4bd5-9b31-6611865db1e9" />

---

### C. Admin
1. **HomePage**
<img width="1093" height="583" alt="image" src="https://github.com/user-attachments/assets/a456df79-97b0-4c5b-ba47-6360e7f2f276" />


2. **Event Requests Page**
<img width="1079" height="564" alt="image" src="https://github.com/user-attachments/assets/e509a558-e2d8-4bbc-a53f-69c9f9366862" />


3. **Manage Sponsorship Request**
<img width="1121" height="497" alt="image" src="https://github.com/user-attachments/assets/f46f2789-7a08-4b82-bade-88d6222d4e29" />


5. **Manage Sponsorship**
<img width="1077" height="577" alt="image" src="https://github.com/user-attachments/assets/fde18b48-cbdb-4c88-b905-69e0bd97d306" />


6. **Manage Accounts Page**
<img width="1126" height="581" alt="image" src="https://github.com/user-attachments/assets/02890f83-58d8-4833-888e-cfd9613f5ecc" />

