# Treemium

The treemium application.

## Installation

1. Clone the repository.

```shell
git clone https://github.com/le-harivansh/treemium
```

2. Go into the project directory.

```shell
cd treemium
```

3. Setup the project environment.

```shell
cp .env.example .env
```

4. Run the application.

```shell
./vendor/bin/sail up
```

5. Migrate & seed the database.

```shell
./vendor/bin/sail artisan migrate:fresh --seed
```

6. Build the yarn assets.

```shell
./vendor/bin/sail yarn build
```

7. (optional) Create a new administrator.

```shell
./vendor/bin/sail artisan admin:new
```


## Usage

#### Mailhog
The mailhog service is available at port `8025` on the application. All the emails sent by the application will be caught by mailhog for the time being.

#### Sending a message
You can send a message from the 'Contact form' on the landing page of the application. That message will be saved to the database, and will be accessible in the application's administration section.

#### Authentication
You can access the administration section at [http://localhost/admin/login](http://localhost/admin/login). If you have migrated and seeded the database, you can access it using the following user credentials:
Email: **one@one.one**
Password: **password**

#### Capabilities

You can do the following in the application:

* Create a new administrator (command-line)
* Log in the application
* Log out of the application
* Reset your password if you forgot it
* View a message (query)
* Mark a message (query) as _resolved_
* Trash a message (query)
* Permanently delete a message (query)
* Add a comment to a message (query)
* Reply to a message (query) directly from the application - and an email will be sent to the user (for the time being, the mail is captured by mailhog, since it is still in development)
