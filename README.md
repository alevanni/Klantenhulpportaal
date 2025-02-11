### Notes

-   The APP_URL in the .env file should be set exactly as the url in the browser (with the port, if needed)
-   `'supports_credentials'` in the cors.php file should be set to true
-   Database diagram here: https://dbdiagram.io/d/Klantenhulpportaal-67ab1831263d6cf9a0be0cba

### Storemodulefactory

-   State
-   Getters
    -   all
    -   byId
-   Setters
    -   all
    -   byId
    -   deleteById
-   Actions
    -   getAll
    -   create
    -   delete
    -   update

## Services

> Http
>
> > Axios facade requests

> Router
>
> > router facade

## Entities

| Models   | Types    | Resources        |  Domains   |
| -------- | :------- | ---------------- | :--------: |
| User     | User     | UserResource     |   Users    |
| Ticket   | Ticket   | TicketResource   |  Tickets   |
| Category | Category | CategoryResource | Categories |
| Comment  | Comment  | CommentResource  |  Comments  |
| Note     | Note     | NoteResource     |   Notes    |

> Domain
>
> > Pages
>
> > Components (forms, cards, and table)
>
> routes.ts (exports the routes to the app.ts file to be added to the router)
>
> store.ts (calls storemodulefactory)

## Utilities

| Migrations            | Factory         | Seeders        |     Controller     |
| --------------------- | :-------------- | -------------- | :----------------: |
| create_user_table     | UserFactory     | UserSeeder     |   UserController   |
| create_ticket_table   | TicketFactory   | TicketSeeder   |  TicketController  |
| create_category_table | CategoryFactory | CategorySeeder | CategoryController |
| create_comment_table  | CommentFactory  | CommentSeeder  | CommentController  |
| create_note_table     | NoteFactory     | NoteSeeder     |   NoteController   |
