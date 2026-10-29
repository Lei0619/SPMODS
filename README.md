## Smart Passenger Counter & Load Balancer

**Safer Rides. Fairer Loads. Smarter Transport.**

SPMods is an academic project exploring passenger occupancy monitoring and overloading detection for jeepney vehicles in the Philippines. It combines an Arduino-based passenger-counting prototype with a Laravel and React web application for managing driver and vehicle records, and supporting the review of potential capacity violations.

The project brings together hardware prototyping, backend development, database management, API security, and software quality assurance. Its goal is to explore how connected systems can help make passenger occupancy information easier to monitor and transport records easier to manage.

**Project status:** In Development

---

## Table of Contents

- [Overview](#overview)
- [Objectives](#objectives)
- [Key Features](#key-features)
- [Technology Stack](#technology-stack)
- [System Architecture](#system-architecture)
- [Database Overview](#database-overview)
- [API and Security](#api-and-security)
- [Installation](#installation)
- [Running the Project](#running-the-project)
- [Testing and Quality Assurance](#testing-and-quality-assurance)
- [Security Considerations](#security-considerations)
- [Future Improvements](#future-improvements)
- [Disclaimer](#disclaimer)
- [Credits and Acknowledgments](#credits-and-acknowledgments)

---

## Overview

Passenger overloading is a safety concern in public transportation. SPMods explores how passenger counting and organized transport records can support occupancy monitoring and the review of potential capacity violations.

The project has two main components:

- **Arduino prototype:** Uses infrared sensors to detect passenger entry and exit. An LCD displays passenger-count information, while LEDs and a buzzer provide local alerts when configured capacity limits are reached or exceeded.
- **Web application:** Uses Laravel for backend logic and API handling, React with Inertia.js for the user interface, and MySQL for persistent application data.

The web application focuses on driver management, vehicle management, transport routes, authentication and authorization, violation records, and notifications. Automated tests and quality assurance activities support the development process.

SPMods is a prototype and learning project. Features should be considered implemented only when they are present in the current codebase and have been verified.

## Objectives

1. Explore passenger entry and exit detection using infrared sensors.
2. Compare passenger counts against a vehicle's configured capacity.
3. Provide local visual and audible alerts through the hardware prototype.
4. Maintain organized driver, vehicle, and transport-route records.
5. Support the recording and review of potential overloading violations.
6. Protect application resources with appropriate authentication and authorization.
7. Maintain notification records for relevant system events.
8. Improve application reliability through automated testing, API testing, and documented quality assurance practices.
9. Establish a foundation for future communication between the Arduino prototype and the web application.

## Key Features

### Arduino Passenger Counting

- Detect passenger entry and exit through infrared sensors.
- Maintain a passenger count on the hardware prototype.
- Display count information on a 16×2 LCD with I2C.
- Use LEDs and a buzzer for local capacity alerts.

Sensor accuracy depends on the prototype's physical setup and testing. Direct transmission of Arduino readings to the web application is planned and should not be considered implemented until verified.

### Driver Management

- Maintain driver profiles and associated information.
- Associate driver records with application users where configured.
- Validate submitted information through server-side request validation.
- Apply access restrictions to protected driver resources.

### Vehicle Management

- Maintain vehicle details, including plate numbers and configured capacity.
- Support vehicle records and their relevant relationships.
- Validate vehicle-related requests through the backend.

### Transport Route Management

- Organize transport routes, including route names, origins, and destinations.
- Maintain route records for use by supported application features.

### Violations

- Maintain records of potential overloading or capacity-related violations.
- Support review of recorded information.

Violation records are for prototype and administrative purposes. They do not constitute official enforcement decisions.

### Notifications

- Maintain notification records for relevant system events.
- Apply the access rules configured for notification resources.

### Authentication and API Security

- Use Laravel authentication for protected application resources.
- Use Laravel Sanctum for configured API authentication.
- Apply role-based restrictions where required.
- Validate incoming requests on the server.
- Test unauthorized access and permission boundaries.

### Quality Assurance

- Prepare and execute test cases.
- Record actual results and supporting evidence.
- Document defects and retest fixes.
- Run automated tests, static analysis, and code-formatting checks.

Feature availability can change as development progresses. Refer to the current routes, controllers, migrations, and tests when confirming the implementation status of a specific operation.

---

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP | Backend programming language |
| Laravel 13 | Backend framework and application logic |
| React | User interface development |
| TypeScript / TSX | Typed frontend development |
| Inertia.js | Integration between Laravel and React |
| CoreUI React | Administrative interface components |
| MySQL | Relational database |
| Laravel Sanctum | Authentication for configured API routes |
| Spatie Laravel Permission | Role and permission management |
| Docker Compose | Containerized development environment |
| Arduino Uno R3 | Hardware prototyping and sensor control |
| Infrared sensors | Passenger entry and exit detection |
| 16×2 LCD with I2C | Passenger-count display |
| LEDs and buzzer | Local capacity alerts |
| Pest | Automated application testing |
| PHPStan | Static code analysis |
| Laravel Pint | Code formatting |
| Postman / cURL | API testing |

The table describes the technologies used or intended for the project. The exact setup depends on the current repository configuration.

---

## System Architecture

SPMods is being developed around a hardware prototype and a web application.

### Hardware prototype

The Arduino reads infrared sensor inputs, updates the local passenger count, and provides feedback through the LCD, LEDs, and buzzer.

### Web application

The Laravel backend handles application logic, request validation, authentication, authorization, and database operations. React components integrated through Inertia.js provide the web interface for supported management features.

### Planned integration

Direct Arduino-to-Laravel communication is a planned improvement. Once implemented, this integration is intended to allow hardware readings to be transmitted to the web application for centralized storage and review.

Until the integration is implemented and tested, the hardware prototype and web application should be treated as separate components.

---

## Database Overview

The configured MySQL database is named `smart_passenger_monitoring`.

The current project scope focuses on the following data areas:

| Data area | Purpose |
|---|---|
| `users` | Application accounts and authentication |
| `drivers` | Driver profiles and related information |
| `vehicles` | Vehicle details, capacity, and configured relationships |
| `violations` | Records of potential capacity-related violations |
| `notifications` | Notification records |
| `personal_access_tokens` | Laravel Sanctum personal access tokens, where used |

Laravel's authentication and authorization packages may also maintain supporting tables for permissions, sessions, passkeys, two-factor authentication, queues, and caching.

This overview reflects the intended current scope, not a complete inventory of every table present in the database. Older migrations may remain in the repository or local database even when the corresponding feature is no longer part of active development. The migrations and model relationships in the current codebase remain the source of truth for the actual schema.

---

## API and Security

The Laravel application exposes API routes for supported resources. The available operations and their access rules are determined by the current route configuration, middleware, controllers, and request validation.

### Driver API

The driver resource routes have been configured to require Sanctum authentication and an administrator role.

| Method | Endpoint | Intended operation |
|---|---|---|
| GET | `/api/drivers` | List driver records |
| POST | `/api/drivers` | Create a driver record |
| GET | `/api/drivers/{driver}` | Retrieve a driver record |
| PUT / PATCH | `/api/drivers/{driver}` | Update a driver record |
| DELETE | `/api/drivers/{driver}` | Delete a driver record |

These are the standard Laravel resource route patterns. Confirm the currently registered routes before assuming every operation is available.

### Authentication and authorization

- `auth:sanctum` protects routes that require an authenticated request.
- `role:admin` restricts configured routes to users with the administrator role.
- Server-side request validation checks incoming data before it is processed.

An unauthenticated request to `GET /api/drivers` has previously been observed returning `401 Unauthorized` with a JSON message indicating that the request is unauthenticated. This observation confirms the behavior of that request under the tested conditions; other routes and role combinations should be verified independently.

To inspect the registered API routes and middleware, run:

```bash
php artisan route:list --path=api -v
```

For the configured Docker environment:

```bash
docker compose exec laravel.test php artisan route:list --path=api -v
```

---

## Installation

### Prerequisites

For Docker-based development:

- Git
- Docker Desktop
- Docker Compose
- A compatible code editor, such as Visual Studio Code

For direct local development, install compatible versions of PHP, Composer, Node.js, npm, and MySQL.

Use the versions and setup instructions specified by the current repository where available.

### 1. Clone the repository

```bash
git clone https://github.com/Lei0619/SPMODS.git
cd SPMODS
```

### 2. Install dependencies

For a direct local installation:

```bash
composer install
npm install
```

For Docker-based development, follow the project's configured container and dependency setup.

### 3. Configure environment variables

Create an environment file if one does not already exist.

On macOS or Linux:

```bash
cp .env.example .env
```

On Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Configure the database connection and other required environment variables in `.env`.

Do not commit `.env` or other files containing credentials, tokens, or secrets.

### 4. Generate the application key

For direct local development:

```bash
php artisan key:generate
```

For Docker-based development, run the command inside the configured Laravel container.

### 5. Prepare the database

Check the database configuration and confirm that the intended database exists before running migrations.

```bash
php artisan migrate
```

Review seeders before running them, particularly when using a database that contains data you need to preserve.

### 6. Start the application

For direct local development, start Laravel:

```bash
php artisan serve
```

In another terminal, start the frontend development server:

```bash
npm run dev
```

For Docker-based development, use the project's Docker Compose configuration and documented startup commands.

---

## Running the Project

For Docker-based development, run Artisan commands through the Laravel container.

List the registered routes:

```bash
docker compose exec laravel.test php artisan route:list
```

Inspect API routes and their middleware:

```bash
docker compose exec laravel.test php artisan route:list --path=api -v
```

The local URL and port depend on the Docker Compose configuration or local development server settings.

---

## Testing and Quality Assurance

Quality assurance is part of the SPMods development workflow. Testing helps identify defects, verify expected behavior, and reduce the risk of regressions as the application changes.

The workflow includes:

1. Defining test scope, preconditions, and expected results.
2. Preparing suitable test data.
3. Executing documented test cases.
4. Recording actual results and pass/fail status.
5. Capturing relevant screenshots, terminal output, and API responses.
6. Logging defects and retesting fixes.
7. Running regression tests on affected functionality.

### QA tools

| Tool | Purpose |
|---|---|
| Pest | Automated application and feature tests |
| PHPStan | Static analysis |
| Laravel Pint | Code style checks and formatting |
| Postman / cURL | Manual API testing |
| QA workbook | Test cases, execution records, evidence, and defect tracking |
| Jira (optional) | Task and defect tracking |

### Example commands

Run the automated test suite:

```bash
php artisan test
```

Run PHPStan:

```bash
./vendor/bin/phpstan analyse --memory-limit=1G
```

Check formatting without changing files:

```bash
./vendor/bin/pint --test
```

For Docker-based development, execute the corresponding commands inside the Laravel container.

### API security testing

Security tests should cover the access rules defined for each protected resource, including:

- Unauthenticated requests.
- Authenticated users without the required role.
- Authorized administrator requests.
- Invalid or incomplete request data.
- Duplicate or conflicting records.
- Successful and unsuccessful operations.
- Requests involving nonexistent records.
- Data integrity and related-record constraints.

A test should be marked **Pass** only when the observed result meets its documented expected result. Test summaries should reflect the tests actually executed.

---

## Security Considerations

SPMods uses Laravel's authentication, validation, and authorization capabilities to protect application resources.

Security practices include:

- Applying Sanctum authentication to protected API routes.
- Enforcing role-based access where required.
- Validating request data on the server.
- Restricting access to administrative resources.
- Keeping credentials and secrets out of version control.
- Handling API tokens and session credentials carefully.
- Designing limited authentication for future hardware communication.

Installing authentication packages does not automatically secure every endpoint. Routes need the appropriate middleware, authorization checks, and tests for their intended access rules.

Arduino firmware should not contain a long-lived administrator token. Future hardware integration should use a dedicated device-authentication mechanism with limited permissions.

---

## Future Improvements

Planned improvements include:

- Implementing and testing direct Arduino-to-Laravel communication.
- Introducing dedicated authentication for hardware devices.
- Improving sensor accuracy and reducing duplicate passenger counts.
- Adding live occupancy information to the web dashboard.
- Expanding automated API and feature-test coverage.
- Strengthening role and permission tests.
- Improving reports for passenger capacity and potential violations.
- Reviewing deployment configuration and production security.

These items are planned work and should not be interpreted as completed features.

---

## Disclaimer

SPMods is an academic prototype intended to demonstrate passenger counting, capacity monitoring, transport record management, API security, and software quality assurance.

Sensor readings can be affected by hardware placement, environmental conditions, and counting errors. Records and alerts generated by the prototype should not be treated as official enforcement decisions without appropriate validation, operational testing, and authorization by the relevant transport authorities.

SPMods is not a substitute for certified passenger-counting equipment or established transport enforcement procedures.

---

## Credits and Acknowledgments

**Lei Ann Judea C. Dico**  
*Project Creator and Developer*

SPMods is an independently developed academic project exploring how software and hardware can work together to support passenger occupancy monitoring and transport record management.

**Safer Rides. Fairer Loads. Smarter Transport.**
