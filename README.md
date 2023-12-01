<p align="center"><img src="EnerGIS.png" width="400" alt="Laravel Logo"></p>

## About EnerGIS

**EnerGIS** as a Platform for Mapping Alternative Energy Sources with the Support of Artificial Intelligence (AI) in Increasing Education Efficiency Towards Optimal Energy Security

### Meet the Team

- **[Abiyyu Umar Thoyyib](https://github.com/Tivedo)**
- **Aisya Asmaningrum**
- **[Ajeng Zalfa Nurmaulydia](https://github.com/ajengzalfa)**
- **Devi Setya Ardelita**
- **[Muhammad Sukriyatma](https://github.com/sukriyatma)**

## What We Use?

<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a> 
<a href="https://postgresql.org" target="_blank"><img src="https://computerscience.id/wp-content/uploads/2015/08/postgresql-logo.png" width=200 alt="PostgreSQL Logo"></a> 
<a href="https://leafletjs.com" target="_blank"><img src="https://leafletjs.com/docs/images/logo.png" width=200 alt="Leaflet Logo"></a>

## Feature Overview
- Mapping PowerPlant
- Integrated OpenAI ChatGPT
- Quiz as a learning medium
- Admin can create, update, and delete the map

## Getting Started
EnerGIS run in laravel framework, composer as package manager, and using PostgreSQL as database

### Requirement
- **Laravel ^10.10+**
- **Composer** 
- **PostgreSQL 11.0+** 

### Quickstart

Follow these steps to set up and run the Laravel project. The instructions assume you have Git, Composer, and PHP installed on your machine.

1. **Clone the Repository:**
   ```sh
   git clone https://github.com/KukukRuyukTeam/EnerGIS.git
   ```

2. **Install Dependencies:**
   Navigate to the project directory and install the required dependencies using Composer:
   ```bash
   composer install
   ```

3. **Migrate the Database:**
   Before running the server, migrate the database using the following Artisan command:
   ```bash
   php artisan migrate
   ```

4. **Run the Local Server:**
   Once the dependencies are installed and the database is migrated, start the local development server:
   ```bash
   php artisan serve
   ```

   This will launch the server, and you can access the application in your web browser at `http://localhost:8000`. Make sure to update the URL/port accordingly if the default settings are different.

### Support PostgreSQL
Uncomment `extension=pdo_pgsql` and `extension=pgsql` in `php.ini` 

