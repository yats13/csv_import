# CSV Import for Inventory Data

This project includes functionality to import inventory data from a CSV file into the database.

## Importing CSV Files

To import inventory data, follow these steps:

1. **Place the CSV File:**
    - Upload your CSV file into the `public/uploads` directory of the project. Ensure the file is properly formatted and named appropriately.

2. **Run the Import Command:**
    - Use the Laravel Artisan command to start the import process. For the file named `meyer_inventory.csv`, the command is:
      ```bash
      php artisan import:csv meyer_inventory.csv
      ```
    - This command initiates the import process for the specified CSV file.

## Requirements

- Ensure that the `public/uploads` directory is writable and accessible.
- The CSV file should have the correct format expected by the application.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
