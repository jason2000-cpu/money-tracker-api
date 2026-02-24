# MONEY TRACKER API


- This is  simple Money Tracker API using PHP Laravel. 
- The system allows users to manage multiple wallets (accounts).


## Endpoints

### 1 Get all Users

- This allows for fetching all users from the database

    ```
        http://127.0.0.1:8000/api/users
    ```

        #### sample response

    ```
    [
    {
        "id": 1,
        "first_name": "Brenden",
        "last_name": "Treutel",
        "email": "cooper.mayer@example.org",
        "email_verified_at": "2026-02-24T09:23:00.000000Z",
        "created_at": "2026-02-24T09:23:00.000000Z",
        "updated_at": "2026-02-24T09:23:00.000000Z",
        "name": "Brenden Treutel"
    },
    {
        "id": 2,
        "first_name": "Kay",
        "last_name": "Watsica",
        "email": "xkoelpin@example.org",
        "email_verified_at": "2026-02-24T09:23:00.000000Z",
        "created_at": "2026-02-24T09:23:00.000000Z",
        "updated_at": "2026-02-24T09:23:00.000000Z",
        "name": "Kay Watsica"
    },
    ]
    ```


### 2 View user Profile

- This allows users to view their profile, which includes:
  -  All wallets
  -  Each wallet’s balance
  -  Total balance across all wallets

  ```
    http://127.0.0.1:8000/api/user/<user-id>
  ```

  #### Sample response

  ```
    {
    "id": 2,
    "first_name": "Kay",
    "last_name": "Watsica",
    "email": "xkoelpin@example.org",
    "wallets": [
        {
        "id": 3,
        "name": "Cash Wallet",
        "balance": "10000.00"
        },
        {
        "id": 4,
        "name": "Bank Wallet",
        "balance": "50000.00"
        }
    ],
    "total_balance": "60000.00"
    }
  ```

### 3 Create User account

- This creates a user account 

```
 http://127.0.0.1:8000/api/user

```

#### Request Body

```
    {
        "first_name": "Jackson",
        "last_name": "Mwangi",
        "email": "jackson@example.com",
        "password": "StrongPassword123!"
    }
```

#### Sample response

```
    {
        "message": "User Created Successfully",
        "user": {
            "id": 5,
            "first_name": "Jackson",
            "last_name": "Mwangi",
            "email": "jackson@example.com"
        }
    }
```
