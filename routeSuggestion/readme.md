## Route Suggestion:

The source code contains a custom routing solution, using REST endpoints. If a route is misspelled, it will fail with an “Route/Controller/Method Not Found” exception in production, sending the user to a 404 page. To make debugging easier, these exceptions were removed, and you get an _Undefined index_ error. 

We would like to offer a suggestion to the best match existing route. 

For example: if a developer, or a user of the application, tries to point to /fruit, which does not exist, we would want the suggestion to offer something along the lines of:

```
Route [ /fruit ] not found. “Did you mean ‘/fruits’”?
```

The included source code includes a stripped down version of our framework, essentially bare-bones just to get the routes working. 

In __vendor__ > __framework__ > __src__ > __Route__, you will find the Routing classes.

__RouteController.php__ contains the main Route class. Which will likely contain the bulk of the work for this project. A file __RouteSuggestion.php__ has been created in the Route folder and namespace, feel free to use any other filename/structure for this task. 

Routes are organized in the Route class by their roots, i.e. the first word in the route. 
- /__fruits__/1/edit, root = __fruits__

Route::_roots[fruit] then points to a RouteRoot class which then does the rest of the storage and retrieval of route information. 
This task is focused primarily on the key identifiers in the _roots array, catching the incoming route, comparing the root values and when a match is not found, throw a Suggestion. 

### Guidelines:
- The Suggestion should be handled in a separate class, while adding only a setter dependency injection method to the Route class and possibly a die()
- Any code should allow for expansion should we want to change the output, i.e. pass the exception as a JSON object so it can be processed by our TypeScript front-end components
- This would be primarily a developer facing view, rather than a client facing view, but a client could potentially type in an incorrect route. This does not mean that it needs to be pretty, but it should allow for the ability to make it look polished in the future.
- We estimate that this will take less than 90 minutes to implement. 
### Tests
- We currently use phpunit for testing, but if you don’t have it installed, have trouble getting it to run, or are running low on time, pseudo-code for the tests is acceptable
### Code Styling:
- Feel free to use any code styling you wish for this project. We try to subscribe to Sandi Metz “[Rules for developers](https://thoughtbot.com/blog/sandi-metz-rules-for-developers)” whenever possible in our actual codebase, as it makes for easy to refactor/test code, but that is not necessary for this exercise.
- As stated before, the framework code provided is a barebones skeleton of an evolving framework, so please contact us with any questions
