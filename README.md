# ECOPOWRRR

Ecopowrrr is an energy supplier that offers 100% sustainable and renewable energy. They do this by purchasing the surplus that households generate with heat pumps and/or solar panels and then selling it to their customers.

### Requirements to run

1. Synfomy (built on version 5.5.6)
2. PHP (built on version 8.2.6)

## Purpose 

The application to be produced periodically reads the information that the smart devices provide to the (purchasing) customers. These devices have a built-in web server with an API interface. Periodically, using a batch program, all information from all connected customers is collected and processed in a central database. The purchase prices can change periodically, for all previously purchased KwHs the prices for the relevant period remain valid!



## Functionalities 

### Inputs

1. The customer advisor can add the purchasing customers.
    1. The app communicates with the backend via an API interface
    2. The app sends the customer's personal information (bank detail, zip code, and house number)
    3. [Named Link](https://postcode.tech/ "Postcode API") is used to collect the address and geo information
    4. If the meter (yield/surplus) is included in the request, that is also processed by the backend

2. Once the new customer is connected, message is send from the backend to the customer's device saying the application status is activated 

3. When the status is active for a customer the backend can read his/her information 
    1. This information can be but are not limited to:
        1. solar panel
        2. wind turbine
        3. pump
        4. etc...
    2. The device message follows the basic structure:

    ```
    {
     "message_id": "random-hash-code",
     "device_id": "one-time-hash-code-from-the-backend",
     "device_status": "active | inactive",
     "date": "system-date-and-time",
     "devices": [
          { 
               "serial_number":  "serial_number",
               "device_type": "solar | pump | ...",
               "device_status": "active | inactive",
               "device_total_yield": "total-KwH-yield",
               "device_month_yield": "total-KwH-active-month",
               "device_total_surplus": "total-KwH-surplus",
               "device_month_surplus": "surplus-KwH-active-month",
          },
          {
               "serial_number":  "serial_number",
               "device_type": "solar | pump | ...",
               "device_status": "active | inactive",
               "device_total_yield": "total-KwH-yield",
               "device_month_yield": "total-KwH-active-month",
               "device_total_surplus": "total-KwH-surplus",
               "device_month_surplus": "surplus-KwH-active-month",
          },
          { ... }
        ]  
    }
    ```
### Outputs

1. Includes a number of spreadsheets that include the following information:
    1. Overview of all constomers, for each customer:
        1. Turnover per year (profit made)
        2. Total of KwH purchased per year 
    2. Overview of total turnover (profit) of the current year with a forecast based on the past results (trend line)
    3. Overview of total turnover, total revenue, and total surplus per municipality
