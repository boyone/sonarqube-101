# Dependency Check

1. [Setup and install Dependency-check](#1-setup-and-install-dependency-check)
2. [Analysis and options](#2-analysis-and-options)
3. [Output](#3-output)
4. [Config `sonar.dependencyCheck` for `sonar-project.properties`](#4-config-sonardependencycheck-for-sonar-projectproperties)

---

## 1. Setup and install Dependency-check

- [https://owasp.org/www-project-dependency-check/](https://owasp.org/www-project-dependency-check/)
  - [Download Command Line](https://github.com/dependency-check/DependencyCheck/releases/download/v12.1.0/dependency-check-12.1.0-release.zip)
- Unzip **dependency-check-12.1.0-release.zip**
- Set PATH

## 2. Analysis and options

- [request-a-nvd-api-key](https://nvd.nist.gov/developers/request-an-api-key)
- run dependecy-check

  - linux/mac

    ```sh
    dependency-check.sh --scan <PATH> --nvdApiKey <nvdApiKey> -f ALL --enableExperimental
    ```

  - windows

    ```sh
    dependency-check.bat --scan <PATH> --nvdApiKey <nvdApiKey> -f ALL --enableExperimental
    ```

  - \*Error updating the NVD Data

    - add more options: `--nvdDatafeed https://nvd.nist.gov/feeds/json/cve/2.0/nvdcve-2.0-\{0\}.json.gz`

    ```sh
    dependency-check.bat --scan <PATH> --nvdApiKey <nvdApiKey> -f ALL --enableExperimental --nvdDatafeed https://nvd.nist.gov/feeds/json/cve/2.0/nvdcve-2.0-\{0\}.json.gz
    ```

## 3. Output

```txt
project
  |-dependency-check-report.csv
  |-dependency-check-report.gitlab
  |-dependency-check-report.html
  |-dependency-check-report.jenkins
  |-dependency-check-report.json
  |-dependency-check-report.junit
  |-dependency-check-report.sarif
  |-dependency-check-report.xml
```

## 4. Config `sonar.dependencyCheck` for `sonar-project.properties`

```properties
sonar.project=<project name>

...

sonar.dependencyCheck.jsonReportPath=dependency-check-report.json
sonar.dependencyCheck.htmlReportPath=dependency-check-report.html
```

## 5. Install dependency-check-plugin for SonarQube

1. Click **marketplace**
2. Accept Term and Condition
3. Install Dependency Check Plugin
