# MONEY TRACKER API


- This is  simple Money Tracker API using PHP Laravel. 
- The system allows users to manage multiple wallets (accounts).


## Endpoints

### 1 Get all Users

- This allows for fetching all users from the database

    ```
        GET: http://127.0.0.1:8000/api/users
    ```

     ###### sample response

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
    GET: http://127.0.0.1:8000/api/user/<user-id>
  ```

  ###### Sample response

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
 POST: http://127.0.0.1:8000/api/user

```

###### Request Body

```
    {
        "first_name": "Jackson",
        "last_name": "Mwangi",
        "email": "jackson@example.com",
        "password": "StrongPassword123!"
    }
```

###### Sample response

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


### 4 Create Wallet
 - This creates a user wallets

 ```
    POST: http://127.0.0.1:8000/api/wallet
 ```

 ###### Request Body

 ```
    {
        "user_id": 1,
        "balance": 90000,
        "name": "Sole Business"
    }
 ```

 ###### Sample response

 ```
    {
        "message": "Wallet Created Successfully",
        "wallet": {
            "id": 10,
            "name": "Sole Business",
            "user_Id": 1,
            "balance": 90000
        }
    }
 ```

 ### View User Wallet

 - This selects a single wallet to view, which includes: wallet balance and all transactions for that wallet

 ```
    GET: http://127.0.0.1:8000/api/wallet
 ```

 ###### Request Body
 ```
    {
        "wallet_id": 1,
        "user_id": 1
    }
 ```

 ###### Sample Response 

 ```
    {
        "id": 1,
        "name": "Cash Wallet",
        "balance": "10000.00",
        "transactions": [
            {
                "id": 1,
                "description": "Sample transaction #1",
                "amount": "27115.00",
                "created_at": "2026-02-24T09:23:01.000000Z"
            },
            {
                "id": 2,
                "description": "Sample transaction #2",
                "amount": "38423.00",
                "created_at": "2026-02-24T09:23:01.000000Z"
            },
        ]
    }
 ```
