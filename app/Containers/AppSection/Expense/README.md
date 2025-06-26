### Expense Container

The Expense container manages outgoing transactions.

#### Available Endpoints
- `POST /v1/expenses` – create a new expense
- `GET /v1/expenses` – list expenses
- `GET /v1/expenses/{id}` – show a single expense
- `PATCH /v1/expenses/{id}` – update an expense
- `DELETE /v1/expenses/{id}` – delete an expense

All routes require authentication and accept/return JSON.
