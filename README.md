Laravel Company Device Logger with polymorphic relationship and JWT Authentication

Description
A company is in need for a tool to log changes of company devices. It is using RESTful api implementation with CRUD to
manage logging for incidents, changes (or change requests) for various devices. Only the authenticated users are allowed to write new log entries or delete entries. 

Techniques used
1. PHP / MySQL
2. Laravel 5.7
3. API based RESTful
4. JWT Authentication
5. Ploymorphic relation 
    - Logs table is splited into the two tables incidents and changes and made use of Laravel ​polymorphic​ relationship methods between them.

To Seed the database 
    - php artisan db:seed

Things left to do:
 - Create testing for each endpoints.

Routing List
+--------+-----------+--------------------------+-------------------+-------------------------------------------------+--------------+
| Domain | Method    | URI                      | Name              | Action                                          | Middleware   |
+--------+-----------+--------------------------+-------------------+-------------------------------------------------+--------------+
|        | GET|HEAD  | api/changes              | changes.index     | App\Http\Controllers\ChangeController@index     | api          |
|        | POST      | api/changes              | changes.store     | App\Http\Controllers\ChangeController@store     | api,auth:api |
|        | DELETE    | api/changes/{change}     | changes.destroy   | App\Http\Controllers\ChangeController@destroy   | api,auth:api |
|        | PUT|PATCH | api/changes/{change}     | changes.update    | App\Http\Controllers\ChangeController@update    | api,auth:api |
|        | GET|HEAD  | api/changes/{change}     | changes.show      | App\Http\Controllers\ChangeController@show      | api          |
|        | GET|HEAD  | api/devices              | devices.index     | App\Http\Controllers\DeviceController@index     | api          |
|        | POST      | api/devices              | devices.store     | App\Http\Controllers\DeviceController@store     | api,auth:api |
|        | GET|HEAD  | api/devices/{device}     | devices.show      | App\Http\Controllers\DeviceController@show      | api          |
|        | PATCH     | api/devices/{device}     | devices.update    | App\Http\Controllers\DeviceController@update    | api,auth:api |
|        | DELETE    | api/devices/{device}     | devices.destroy   | App\Http\Controllers\DeviceController@destroy   | api,auth:api |
|        | GET|HEAD  | api/incidents            | incidents.index   | App\Http\Controllers\IncidentController@index   | api          |
|        | POST      | api/incidents            | incidents.store   | App\Http\Controllers\IncidentController@store   | api,auth:api |
|        | GET|HEAD  | api/incidents/{incident} | incidents.show    | App\Http\Controllers\IncidentController@show    | api          |
|        | DELETE    | api/incidents/{incident} | incidents.destroy | App\Http\Controllers\IncidentController@destroy | api,auth:api |
|        | PATCH     | api/incidents/{incident} | incidents.update  | App\Http\Controllers\IncidentController@update  | api,auth:api |
|        | POST      | api/login                |                   | App\Http\Controllers\AuthController@login       | api          |
|        | GET|HEAD  | api/login                | login             | App\Http\Controllers\AuthController@login       | api          |
|        | POST      | api/logout               |                   | App\Http\Controllers\AuthController@logout      | api          |
|        | GET|HEAD  | api/logs                 |                   | App\Http\Controllers\LogController@index        | api          |
|        | GET|HEAD  | api/logs/{log}           |                   | App\Http\Controllers\LogController@show         | api          |
|        | DELETE    | api/logs/{log}           |                   | App\Http\Controllers\LogController@destroy      | api,auth:api |
|        | POST      | api/register             |                   | App\Http\Controllers\AuthController@register    | api          |
|        | GET|HEAD  | api/users                |                   | Closure                                         | api,auth:api |
+--------+-----------+--------------------------+-------------------+-------------------------------------------------+--------------+