@echo off
chcp 65001 >nul
cd /d "%~dp0"
echo [1/2] Checking Doxygen...
doxygen --version
if errorlevel 1 (
    echo Doxygen is not found in PATH.
    pause
    exit /b 1
)
echo [2/2] Generating HTML documentation...
doxygen Doxyfile
if errorlevel 1 (
    echo Documentation generation failed.
    pause
    exit /b 1
)
echo.
echo Done. Open docs\html\index.html
start "" "%cd%\docs\html\index.html"
pause
