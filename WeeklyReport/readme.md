# WeeklyReport
Weekly Report System based on PHP 7.4.

## Project Summary
| Project name | Weekly Report system |
| -------- | ------- |
| Developer | Damon_Liu |
| Programming Language | PHP 7.4 |
| Database | Support for MySQL / MSSQL / PostgreSQL / <br> Oracle / MongoDB and other multiple databases (PDO) |
| System Architecture | MVC |
| Framework | None
| Front End | HTML + CSS + Javascript / Bootstrap |
| Deployment mode | Apache |
| Development tools | Notepad++ |
| Third party dependence | None |

## Project Architecture
```
project/
│            
├── app/                
│   ├── controllers/    
│   │   ├── DailyReportController.php    
│   │   ├── HomeController.php           
│   │   ├── LoginController.php          
│   │   ├── RegisterController.php       
│   │   ├── WeeklyReportController.php   
│   │   └── ...                          
│   │
│   ├── models/         
│   │   ├── DailyReportModel.php         
│   │   ├── UserModel.php                
│   │   ├── WeeklyReportModel.php        
│   │   └── ...                          
│   │
│   ├── views/          
│   │   ├── includes/    
│   │   │   ├── common.php                
│   │   │   ├── nav.php                   
│   │   │   └── ... 
│   │   └── pages/       
│   │       ├── daily_report_form.php     
│   │       ├── weekly_report_detail.php  
│   │       ├── weekly_report_list.php    
│   │       ├── login.php                 
│   │       ├── register.php              
│   │       └── ...                       
│   │
│   ├── auth.php        
│   ├── functions.php   
│   └── ...             
│
├── core/               
│   ├── Controller.php  
│   ├── Model.php       
│   ├── Database.php    
│   ├── Router.php      
│   └── ...             
│
├── public/             
│   ├── index.php       
│   ├── assets/         
│   │   ├── css/        
│   │   │   ├── login-register-page.css        
│   │   │   ├── weekly-report-detail-page.css  
│   │   │   ├── weekly-report-list-page.css    
│   │   │   └── ...
│   │   ├── js/         
│   │   └── ...
│   └── ...    
│
├── config/             
│   ├── database.php    
│   ├── config.php      
│   └── ...     
│
├── vendor/           
│   └── ...
├── .htaccess 
├── README.md
└── ... 

```
<br>
<b>Apps/: </b> &nbsp;&nbsp;<i>Application code, including the controllers, models, and views in the MVC.</i><br>
<b>Core/: </b> &nbsp;&nbsp;<i>Core code directory, including the controller base class, model base class, database base class, and routing base class.</i><br>
<b>public/: </b> &nbsp;&nbsp;<i>Public directory of the Web server, including front-end resources and entry files.</i><br>
<b>config/: </b> &nbsp;&nbsp;<i>Profiles, including database and routing configurations.</i><br>
<b>vendor/: </b> &nbsp;&nbsp;<i>Third-party dependency library.</i><br>
<b>.htaccess: </b> &nbsp;&nbsp;<i>The configuration file used for the Apache server.</i><br>
<b>README.md: </b> &nbsp;&nbsp;<i>Description document of the project.</i>

<br>
<hr>
<br>

## 项目概要：
| 项目名称 | 周报系统 |
| -------- | ------- |
| 开发人员 | Damon_Liu |
| 编程语言 | PHP 7.4 |
| 数据库   | 支持MySQL / MSSQL / PostgreSQL / <br> Oracle / MongoDB 等多种数据库 (PDO) |
| 系统架构 | MVC |
| 框架     | 无 (从0手撕) |
| 前端     | HTML+CSS+Javascript/Bootstrap |
| 部署方式 | Apache |
| 开发工具 | Notepad++ |
| 第三方依赖 | 无 |

## 项目架构：　
```
project/ 
│            
├── app/                应用程序代码
│   ├── controllers/    控制器代码目录
│   │   ├── DailyReportController.php    日报控制器
│   │   ├── HomeController.php           主页控制器
│   │   ├── LoginController.php          登录控制器
│   │   ├── RegisterController.php       注册控制器
│   │   ├── WeeklyReportController.php   周报控制器
│   │   └── ...                          
│   │
│   ├── models/         模型代码目录
│   │   ├── DailyReportModel.php         日报模型
│   │   ├── UserModel.php                用户模型
│   │   ├── WeeklyReportModel.php        周报模型
│   │   └── ...                          
│   │
│   ├── views/          视图代码目录
│   │   ├── includes/    视图公共代码目录
│   │   │   ├── common.php                公共函数库
│   │   │   ├── nav.php                   导航栏视图
│   │   │   └── ...                       
│   │	│
│   │   └── pages/       页面视图代码目录
│   │       ├── daily_report_form.php     日报表表单视图
│   │       ├── weekly_report_detail.php  周报表详情视图
│   │       ├── weekly_report_list.php    周报表列表视图
│   │       ├── login.php                 登录视图
│   │       ├── register.php              注册视图
│   │       └── ...                       
│   │
│   ├── auth.php        身份验证函数库
│   ├── functions.php   公共函数库
│   └── ...             
│
├── core/               核心代码目录
│   ├── Controller.php  控制器基类
│   ├── Model.php       模型基类
│   ├── Database.php    数据库基类
│   ├── Router.php      路由基类
│   └── ...             
│
├── public/             Web 服务器公共目录
│   ├── index.php       入口文件
│   ├── assets/         前端资源目录
│   │   │
│   │   ├── css/        CSS 样式表目录
│   │   │   ├── login-register-page.css        注册登录样式
│   │   │   ├── weekly-report-detail-page.css  周报明细样式
│   │   │   ├── weekly-report-list-page.css    周报列表样式
│   │   │   └── ...
│   │   │
│   │   ├── js/         JavaScript 脚本目录
│   │   └── ...
│   └── ...             
│
├── config/             配置文件目录
│   ├── database.php    数据库配置文件
│   ├── config.php      应用程序配置文件
│   └── ...             其他配置文件
│
├── vendor/             第三方依赖库目录
│   └── ...             
│
├── .htaccess           Apache 服务器配置文件
│
├── README.md           项目说明文档
│
└── ...                 
```
<br>
<b>app/: </b> &nbsp;&nbsp;<i>应用程序代码，包括 MVC 中的控制器、模型和视图。</i><br>
<b>core/: </b> &nbsp;&nbsp;<i>核心代码目录，包括控制器基类、模型基类、数据库基类、路由基类。</i><br>
<b>public/: </b> &nbsp;&nbsp;<i>Web 服务器的公共目录，包括前端资源和入口文件。</i><br>
<b>config/: </b> &nbsp;&nbsp;<i>配置文件，包括数据库和路由配置。</i><br>
<b>vendor/: </b> &nbsp;&nbsp;<i>第三方依赖库。</i><br>
<b>.htaccess: </b> &nbsp;&nbsp;<i>用于 Apache 服务器的配置文件。</i><br>
<b>README.md: </b> &nbsp;&nbsp;<i>项目的说明文档。</i><br>
