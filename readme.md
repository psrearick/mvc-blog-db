# Blog

## Design Decisions

### MVC Pattern
I am using the MVC organizational pattern to avoid duplication of code and facilitate a clean, logical structure with a separation of concerns. This also adds flexibility and extensibility to the system.

I am loosely basing this off the concepts used for Laravel.

The structure of the code and features are more than a project like this would likely need. This is to make the system more extensible, focusing more on sustainability and scalability.

### Autoloading and Namespacing 

Utilizes namespaces as outlined in the PSR-4 standard. PSR-4 autoloading enables us to easily use namespaces to separate internal package files from those of dependencies that may be installed in the future as well as future internal functionality that may share class names.

### Routing

I set up routing based on url parameters to make it easy to add new routes. Each route can be configured to allow for a callback so that they can be processed differently. The routing is also designed to accept wildcards.

### Data

To avoid configuring a database, demo data is stored in the `runtime` directory. The database queries are partially constructed, then `TODOS` are written to explain roughly how the query would be run on the database and what should be returned.

### Views

Views utilize templates to avoid duplicating code. There is also a Response controller to handle HTTP responses.

### Create Post Form

The post data is sanitized in the `Request` class in case invalid characters are submitted in the form.

### Models

I made the fields of each model as properties. That way we can set all the properties at once (using `loadData`). This makes setting the data really convenient.

All the models extend from a base model which can set the properties and validate them.

### Session Handling
I incorporated basic session handling for flash messages and authentication.

### Validation
There is basic server-side form validation. The error messages are added when the form is created. This is easily done as each form field is dynamically created.

### Protected Routes

Only autenticated users can access certain pages, such as the Create Post page.

### Middleware

I am using a simple middleware pattern so more middlewares can be added as needed instead of being stuck with one strategy of a million `if-else`s.

### Authentication

For demo purposes, in `public/index.php`, within the `config` array, the value for `start_logged_in` determines if a user is logged in by default or not. If this is set to `true`, you will not be able to log out, but will not need to log in. If it is set to `false`, you will need to log in. Just get the credentials from the demo data.

### Creating Items
As there is no database setup, new records cannot be created. After a form validates, it just redirects the user to an existing record.

### Front End Styling

The is very minimal frontend styling, again to give options down-the-road.