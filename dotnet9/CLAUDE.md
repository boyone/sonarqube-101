# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a .NET 9 minimal API web application that provides a weather forecast endpoint. The application uses ASP.NET Core with OpenAPI support and follows the minimal API pattern introduced in .NET 6+.

## Architecture

- **Single-file application**: The entire application logic is contained in `Program.cs` using the minimal API approach
- **Target Framework**: .NET 9.0 with nullable reference types and implicit usings enabled
- **OpenAPI Integration**: Uses Microsoft.AspNetCore.OpenApi for API documentation
- **Configuration**: Standard ASP.NET Core configuration with appsettings.json files
- **Launch Profiles**: Configured for both HTTP (port 5200) and HTTPS (port 7218) development

## Development Commands

### Build and Run
```bash
dotnet build                    # Build the application
dotnet run                      # Run the application (uses https profile by default)
dotnet run --launch-profile http   # Run with HTTP only
dotnet run --launch-profile https  # Run with HTTPS
```

### Testing
```bash
dotnet test                     # Run tests (no test projects currently exist)
```

### Package Management
```bash
dotnet restore                  # Restore NuGet packages
dotnet add package <package>    # Add a NuGet package
```

### API Testing
- Use the `dotnet9.http` file with REST client extensions in VS Code or similar tools
- The weather forecast endpoint is available at `/weatherforecast`
- Default development URLs: http://localhost:5200 and https://localhost:7218

## Key Files

- `Program.cs`: Main application entry point containing all API endpoints and configuration
- `dotnet9.csproj`: Project file with dependencies and target framework
- `appsettings.json`: Production configuration
- `appsettings.Development.json`: Development-specific configuration  
- `Properties/launchSettings.json`: Development server configuration
- `dotnet9.http`: HTTP requests for testing the API endpoints

## API Endpoints

- `GET /weatherforecast`: Returns a 5-day weather forecast with random data
- OpenAPI documentation available at `/openapi/v1.json` (development only)

## Development Notes

- The application uses top-level statements and minimal API patterns
- No controllers or separate service layers - all logic is in Program.cs
- Uses record types for data transfer objects (WeatherForecast)
- Configured for development with browser launch disabled
- HTTPS redirection is enabled for production scenarios