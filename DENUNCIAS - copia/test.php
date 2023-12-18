<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
    box-sizing: border-box;
}

body {
    background-color: #f6f7fb;
    color: #888da8;
    letter-spacing: 0.2px;
    font-family: 'Roboto', sans-serif;
    padding: 0;
    margin: 0;
}

a,
p,
span,
div,
li,
td {
    font-weight: 300!important;
}

::placeholder {
    color: #ccc !important;
    font-weight: 300;
}

:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: #ccc !important;
    font-weight: 300;
}

::-ms-input-placeholder {
    /* Microsoft Edge */
    color: #ccc !important;
    font-weight: 300;
}

input {
    border-color: #d8e0e5;
    border-radius: 2px !important;
    box-shadow: none !important;
    font-weight: 300 !important;
}

.form-control:disabled,
.form-control[readonly] {
    background-color: #f6f7fb;
}

button.btn {
    border-radius: 2px !important;
    box-shadow: none !important;
}

button.btn.btn-primary {
    background-color: #0e9aee !important;
}

button.btn.btn-primary:hover {
    background-color: #0879c8 !important;
}

#left-menu {
    position: fixed;
    top: 0;
    left: 0;
    width: 280px;
    background-color: #313644;
    overflow-y: auto;
    height: 100vh;
    border-right: 1px solid #e6ecf5;
    margin-top: 60px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    overflow-x: hidden;
    z-index: 2;
}

#left-menu.small-left-menu,
#logo.small-left-menu {
    width: 60px;
}

#left-menu ul {
    padding: 0;
    margin: 0;
}

#left-menu ul li {
    padding: 0 10px;
    display: block;
    position: relative;
}

#left-menu > ul > li {
    margin: 15px 0;
}

#left-menu ul li a {
    color: #99abb4;
    width: 100%;
    display: inline-block;
    width: 260px;
    height: 37px;
    position: relative;
}


#left-menu ul li a i {
    font-size: 22px;
    text-align: center;
    width: 35px;
    height: 35px;
    display: inline-block;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#left-menu ul li:hover a span{
    color: #0e9aee;
}
#left-menu ul li:hover a i{
    color: #0e9aee;
}

#left-menu ul li a span {
    width: 100%;
    height: 35px;
    padding-left: 10px;
    color: #99abb4;
    font-weight: 300;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

#left-menu ul li.active a {
    border-bottom: 2px solid #0e9aee;
}

#left-menu ul li.active a span {
    color: #fff;
}

#left-menu ul li.active a i {
    background-color: #0e9aee;
    color: #fff;
}


#left-menu li.has-sub ul {
    background-color: #454e62;
    margin: 0 -10px;
    padding-left: 45px;
    height: 0;
    overflow: hidden;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

#left-menu li ul.open {
/*    height: 140px;*/
}

#left-menu li.has-sub ul > li {
    padding-top: 10px;
}

a:hover {
    text-decoration: none;
}

#logo {
    position: fixed;
    top: 0;
    z-index: 2;
    left: 0;
    background-color: #464e62;
    border-color: #464e62;
    height: 60px;
    width: 280px;
    font-size: 30px;
    line-height: 2em;
    border-right: 1px solid #e6ecf5;
    z-index: 4;
    color: #fff;
    padding-left: 15px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    overflow: hidden;
}


#header {
    background-color: #fff;
    height: 60px;
    border-bottom: 1px solid #e6ecf5;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 3;
}

#header .header-left {
    padding-left: 300px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

#header .header-right {
    padding-right: 40px;
}

#header .header-right i,
#header .header-left i {
    font-size: 30px;
    line-height: 2em;
    padding: 0 5px;
    cursor: pointer;
}

#main-content {
    min-height: calc(100vh - 60px);
    clear: both;
}

#page-container {
    padding-left: 300px;
    padding-top: 80px;
    padding-right: 25px;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

#page-container.small-left-menu,
#header .header-left.small-left-menu {
    padding-left: 80px;
}

.card {
    border: 1px solid #e6ecf5;
    margin-bottom: 1em;
    font-weight: 300;
}

.card .title {
    padding: 15px 20px;
    border-bottom: 1px solid #e6ecf5;
    margin-bottom: 10px;
    color: #000;
    font-size: 18px;
}

#show-lable {
    opacity: 0;
    visibility: hidden;
    left: 80px;
    font-weight: 300;
    padding: 6px 15px;
    background-color: #0e9aee;
    position: fixed;
    color: #fff;
    -webkit-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

#left-menu.small-left-menu li.has-sub::after{
    content: '';
}
#left-menu.small-left-menu li.has-sub ul{
    position: fixed;
    width: 280px;
    z-index: 123;
    height: 0;
    left: 69px;
    padding-left: 15px;
}

@media only screen and (max-width: 992px) {
    #left-menu,
    #logo {
        width: 60px;
    }
    
    #page-container,
    #header .header-left {
        padding-left: 80px;
    }
    
    #toggle-left-menu,.big-logo{
        display: none;
    }
/*
    #logo{
        padding: 0;
        padding-left: 3px;
    }
    .small-logo{
        display: block;
    }
*/
    
}

@media only screen and (min-width: 992px) {
    #left-menu li.has-sub::after {
        font-family: "Ionicons";
        content: "\f3d3";
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        transform: rotate(0deg);
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }
    #left-menu li.has-sub.rotate:after {
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .small-logo{
        display: none;
    }
    
}    
    </style>
</head>
<body>
<div id="logo">
        <span class="big-logo">.S!mple</span>
        <span class="small-logo">S!M</span>
    </div>
    <div id="left-menu">
        <ul>
            <li class="active"><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Dashboard</span>
            </a></li>
            <li class="has-sub">
                <a href="#">
                    <i class="ion-ios-person-outline"></i>
                    <span>UI Elements</span>
                </a>
                <ul>
                    <li><a href="#">UI Elements Item 1</a></li>
                    <li><a href="#">UI Elements Item 2</a></li>
                    <li><a href="#">UI Elements Item 3</a></li>
                </ul>
            </li>
            <li><a href="#">
                <i class="ion-ios-albums-outline"></i>
                <span>Users</span>
            </a></li>
            <li class="has-sub">
                <a href="#">
                    <i class="ion-ios-person-outline"></i>
                    <span>UI Elements</span>
                </a>
                <ul>
                    <li><a href="#">UI Elements Item 1</a></li>
                </ul>
            </li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-albums-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-albums-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-albums-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-albums-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-albums-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-albums-outline"></i>
                <span>Users</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Table</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Grid system</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Permission</span>
            </a></li>
            <li><a href="#">
                <i class="ion-ios-person-outline"></i>
                <span>Users</span>
            </a></li>
            <li class="has-sub">
                <a href="#">
                    <i class="ion-ios-person-outline"></i>
                    <span>UI Elements</span>
                </a>
                <ul>
                    <li><a href="#">UI Elements Item 1</a></li>
                    <li><a href="#">UI Elements Item 2</a></li>
                    <li><a href="#">UI Elements Item 3</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <i class="ion-ios-chatboxes-outline"></i>
                    <span>Report</span>
                </a>
                <ul>
                    <li><a href="#">Report Item 1</a></li>
                    <li><a href="#">Report Item 2</a></li>
                    <li><a href="#">Report Item 3</a></li>
                    <li><a href="#">Report Item 3</a></li>
                    <li><a href="#">Report Item 3</a></li>
                    <li><a href="#">Report Item 3</a></li>
                    <li><a href="#">Report Item 3</a></li>
                </ul>
            </li>
            <li><a href="#">
                <i class="ion-ios-albums-outline"></i>
                <span>Users</span>
            </a></li>
            <li class="has-sub">
                <a href="#">
                    <i class="ion-ios-chatboxes-outline"></i>
                    <span>Report</span>
                </a>
                <ul>
                    <li><a href="#">Report Item 1</a></li>
                    <li><a href="#">Report Item 2</a></li>
                    <li><a href="#">Report Item 3</a></li>
                    <li><a href="#">Report Item 3</a></li>
                    <li><a href="#">Report Item 3</a></li>
                    <li><a href="#">Report Item 3</a></li>
                    <li><a href="#">Report Item 3</a></li>
                </ul>
            </li>
            <li><a href="#">
                <i class="ion-ios-chatboxes-outline"></i>
                <span>Setting</span>
            </a></li>

        </ul>
    </div>
    <div id="main-content">
        <div id="header">
            <div class="header-left float-left">
                <i id="toggle-left-menu" class="ion-android-menu"></i>
            </div>
            <div class="header-right float-right">
                <i class="ion-ios-people"></i>
            </div>
        </div>

        <div id="page-container">
            <div class="card">
                <div class="title">Users</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="html" type="checkbox" class="magic-checkbox">
                                    <label for="html">HTML</label>

                                    <input id="css" type="checkbox" class="magic-checkbox">
                                    <label for="css">CSS</label>

                                    <input id="js" type="checkbox" class="magic-checkbox">
                                    <label for="js">Javascript</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input name="job" id="designer" type="radio" class="magic-radio">
                                    <label for="designer">Web designer</label>

                                    <input name="job" id="developer" type="radio" class="magic-radio">
                                    <label for="developer">Web developer</label>

                                    <input name="job" id="frontened" type="radio" class="magic-radio">
                                    <label for="frontened">Frontened</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Button</label> <br>
                                    <button class="btn btn-primary">Sumbmit</button>
                                    <button class="btn btn-warning">Sumbmit</button>
                                    <button class="btn btn-info">Sumbmit</button>
                                    <button class="btn btn-danger">Sumbmit</button>
                                    <button class="btn btn-secondary">Sumbmit</button>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Languages</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">HTML</option>
                                        <option value="">CSS</option>
                                        <option value="">JS</option>
                                        <option value="">PHP</option>
                                        <option value="">SQL</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Users</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Users</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Users</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Users</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Users</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Users</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="title">Users</div>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span id="show-lable">Hello</span>
</body>
</html>