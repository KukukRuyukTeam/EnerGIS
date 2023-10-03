<p align="center"><a href="https://laravel.com" target="_blank"><img src="EnerGIS.png" width="400" alt="Laravel Logo"></a></p>

## About EnerGIS

**EnerGIS** as a Platform for Mapping Alternative Energy Sources and Charging Station with the Support of Artificial Intelligence (AI) in Increasing Education Efficiency Towards Optimal Energy Security

- Mapping PowerPlant
- Integrated OpenAI ChatGPT

### Meet the Team

- **[Abiyyu Umar Thoyyib](https://github.com/Tivedo)**
- **Aisya Asmaningrum**
- **[Ajeng Zalfa Nurmaulydia](https://github.com/ajengzalfa)**
- **Devi Setya Ardelita**
- **[Muhammad Sukriyatma](https://github.com/sukriyatma)**

## What We Need?

<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a> 
<a href="https://postgresql.org" target="_blank"><img src="https://computerscience.id/wp-content/uploads/2015/08/postgresql-logo.png" width=200 alt="PostgreSQL Logo"></a> 
<a href="https://leafletjs.com" target="_blank"><img src="https://leafletjs.com/docs/images/logo.png" width=200 alt="Leaflet Logo"></a>


## Getting Started
EnerGIS run in laravel framework, and using composer as package manager

### Requirement
- **Laravel ^10.10**
- **Composer** 
- **PostgreSQL** 

### Quickstart

Clone this repository
```sh
git clone https://github.com/KukukRuyukTeam/EnerGIS.git
```
Install the dependency, run the command in directory
```bash
composer install
```

Before run the server, we need to migrate the database
```bash
php artisan migrate
```

After install all the dependency and create the init the database, run the server locally
```bash
php artisan serve
```

### Support PostgreSQL
Uncomment `extension=pdo_pgsql` and `extension=pgsql` in `php.ini` 

## Documentation
- **[Pembangkit](docs/pembangkit-api.json)**

