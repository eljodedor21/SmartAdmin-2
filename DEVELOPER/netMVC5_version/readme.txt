SmartAdmin 1.5 

Issue Tracker: [This project references NuGet package(s) that are missing on this version. Enable NuGet Package Restore to download them.  For more information, see http://go.microsoft.com/fwlink/?LinkID=322105.]

When we commit the updates for SmartAdmin 1.5, the Packages folder is not included into the Source Control. In doing so, it saves us both repository size and download security issues.

If you get the error stated above on the first time you run the Solution, by simply enabling Nuget package manager to download those packages, you can run the project smoothly. 

Remedy:

1.) In Visual Studio, enable "Allow NuGet to download missing packages during build". 
	Click Tools --> Options -> Package Manager -> General.

2.) Next, Right-click the solution and click "Enable Nuget Package Restore". 
	This will download the necessary packages needed to run the solution.

3.) Build the project and Run.


Note: The packages are the default package files when you create a new MVC template right within Visual Studio.