# Exercises

## 1. js

    - create project
    - create token
    - run sonar-scanner

        ```sh
        sonar-scanner -Dsonar.token=<token> -Dsonar.host=<url>
        ```

## 2. php-slim

    - create project
    - create token
    - run sonar-scanner

        ```sh
        sonar-scanner -Dsonar.token=<token> -Dsonar.host=<url>
        ```

## 3. dotnet9

    - create project
    - create token
    - run dotnet-sonarscanner

        ```sh
        dotnet-sonarscanner begin /k:"dotnet9" /d:sonar.token="sqp_52d9345c9ec57365764702dc266056b4acb550a6" /d:sonar.host.url="http://localhost:9000"
        dotnet build . --no-incremental
        dotnet-sonarscanner end /d:sonar.token="sqp_52d9345c9ec57365764702dc266056b4acb550a6"
        ```
