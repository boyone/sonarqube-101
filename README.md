---
marp: true
---

# Static Code Analysis with SonarQube

1. Technical Debt Landscape
2. SonarQube Reference
3. Supported Languages
4. SonarQube in Action: SCK Online Store

---

## [Technical Debt Landscape](./technical-debt.md)

1. [Source Code](./technical-debt.md#1-source-code-level)
2. [Architecture](./technical-debt.md#2-architecture-level)
3. [Production Infrastructure](./technical-debt.md#3-production-infrastructure-level)

---

## [SonarQube](./sonarqube.md)

1. [SonarQube คืออะไร?](./sonarqube.md#sonarqube-คืออะไร)
2. [ทำไมต้องใช้ SonarQube?](./sonarqube.md#ทำไมต้องใช้-sonarqube)
3. [คุณสมบัติหลัก](./sonarqube.md#คุณสมบัติหลัก)
4. [The seven axes of quality](./sonarqube.md#the-seven-axes-of-quality)

---

## [Supported Languages](./sonarqube-supported-languages.md)

---

## SonarQube in Action

1. [Install Sonarqube](./sonarqube-in-action.md#1-install-sonarqube)
2. [Install **sonar-scanner**](./sonarqube-in-action.md#2-install-sonar-scanner)
3. [Analysis parameters](./sonarqube-in-action.md#3-analysis-parameters)
4. [Output](./sonarqube-in-action.md#4-output)
5. [Interface conventions](./sonarqube-in-action.md#5-interface-conventions)

---

## Analysis Project: SCK Online Store

1. [Start SonarQube](./analysis-project-sck-online-store.md#1-start-sonarqube)
2. [Create Project](./analysis-project-sck-online-store.md#2-create-project)
3. [Create Token](./analysis-project-sck-online-store.md#3-create-token)
4. [Clone project](./analysis-project-sck-online-store.md#4-clone-project)
5. [Copy coverage.out and sonar-project.properties](./analysis-project-sck-online-store.md#5-copy-coverageout-and-sonar-projectproperties)
6. [Run sonar-scanner at sck-online-store/store-service](./analysis-project-sck-online-store.md#6-run-sonar-scanner-at-sck-online-storestore-service)

---

## Exercises

1. [js](./exercises.md#1-js)
    - code coverage
2. [php-slim](./exercises.md#2-php-slim)
    - code coverage
3. [dotnet9](./exercises.md#3-dotnet9)
    - code coverage

---

## Dependency-check

1. [Setup and install Dependency-check](./dependency-check.md#1-setup-and-install-dependency-check)
2. [Analysis parameters](./dependency-check.md#2-analysis-and-options)
3. [Output](./dependency-check.md#3-output)
4. [Config `sonar.dependencyCheck` for `sonar-project.properties`](./dependency-check.md#4-config-sonardependencycheck-for-sonar-projectproperties)

---

## integrate with git + jenkins + SonarQube

---

## Reference

1. [download SonarQube](https://www.sonarsource.com/products/sonarqube/downloads/)
2. [setup SonarQube](https://docs.sonarsource.com/sonarqube-server/latest/try-out-sonarqube/)
3. [release cycle model](https://docs.sonarsource.com/sonarqube-server/latest/server-upgrade-and-maintenance/upgrade/release-cycle-model/)
4. [community releases](https://community.sonarsource.com/c/sq/releases/24)
5. [upgrade SonarQube](https://docs.sonarsource.com/sonarqube-server/latest/server-upgrade-and-maintenance/upgrade/roadmap/)
6. [supported languages](https://docs.sonarsource.com/sonarqube-server/latest/analyzing-source-code/languages/overview/)
7. [SonarQube docker's hub](https://hub.docker.com/_/sonarqube)
