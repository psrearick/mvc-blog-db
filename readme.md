# Blog

## Design Decision

### MVC Pattern
I am using the MVC organizational pattern to avoid duplication of code and facilitate a clean, logical structure with a separation of concerns. This also adds flexibility and extensibility to the system.

### Objects
Using object-oriented methodology for:

Benefits:

Less code duplication

Easier to understand code

More maintainable code

encapsulates relevant code

### Autoloading and Namespacing 

Utilizes namespaces as outlined in the PSR-4 standard. PSR-4 autoloading enables us to easily use namespaces to separate internal package files from those of dependencies that may be installed in the future as well as future internal functionality that may share class names.

### Routing

I set up routing based on url parameters to make it easy to add new routes. Each route can be configured to allow for a callback so that they can be processed differently.

### Data

To avoid configuring a database, demo data is stored in the `runtime` directory.

### Views

Views utilize templates to avoid duplicating code. There is also a Response controller to handle HTTP responses.

### Create Post Form

The post data is sanitized in the `Request` class in case invalid characters are submitted in the form.