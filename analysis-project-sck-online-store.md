# Analysis Project: SCK Online Store

## 1. Start SonarQube

```sh
docker compose up -d
```

## 2. Create Project

1.  Select **Create Project** and **Local project**.
2.  Give your project a **Project key** and a **Project Display name** and select **Next**.
3.  Select **Use the global setting**
4.  Click **Create project**

## 3. Create Token

1.  Click **Admin** and **My Account**
2.  Click **Security** tab
3.  Give your **Token Name** and a **Token Type** selects **Project Analysis Token** and select a **Project Name** then click **Generate**
4.  Copy token to clipboard

## 4. Clone project 

1. [https://github.com/SCK-SEAL-TEAM-One/sck-online-store](https://github.com/SCK-SEAL-TEAM-One/sck-online-store)

## 5. Copy coverage.out and sonar-project.properties

1. `store-service-conf/coverage.out` and `store-service-conf/sonar-project.properties` and paste at `sck-online-store/store-service`

## 6. Run sonar-scanner at sck-online-store/store-service

```sh
sonar-scanner -Dsonar.token=sqp_cc4a1c83171bc7bf08802f021adf6e5e10cfed4b
```
