# Blog

## Design Decision

### MVC Pattern
I am using the MVC organization pattern to avoid duplication of code and facilitate a clean, logical structure with a separation of concerns. This also adds flexibility and extensibility to the system.

### Objects
Using object-oriented methodology for:

Benefits:

Less code duplication

Easier to understand code

More maintainable code

encapsulates relevant code

### Autoloading and Namespacing 

Utilizes namespaces as outlined in the PSR-4 standard. PSR-4 autoloading enables us to easily use namespaces to separate internal package files from those of dependencies that may be installed in the future as well as future internal functionality that may share class names.