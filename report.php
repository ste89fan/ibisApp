<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ibis Graphicon</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel="stylesheet" href="path/to/easy-autocomplete.min.css"> -->
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css" />
    
    

</head>
<body>

            <div id="sidebar">
            </div>
    <header>
    
    <nav class="navbar navbar-light bg-light justify-content-between upper-nav pb-1">
        <a class="navbar-brand font-weight-bold pb-0">Report</a>
        <form class="form-inline" action="users_model/logout.php">
            <button type="submit" class="btn btn-sm logout-button px-5">Logout</button>
        </form>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSecondNav" aria-controls="navbarSecondNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mac-navbar pb-2 pt-2" id="navbarSecondNav">
            <ul class="navbar-nav ul-for-fields">
            <form class="form-inline mac-form" action="" method="POST">
                <div class="d-flex d-inline mac-contract-area">
                    <li class="nav-item">
                        <label for="mac"><input type="text" name="mac" id="mac" placeholder="Mac: address" class="btn btn-sm nav-down-field mr-3"/></label>
                    </li>
                    <li class="nav-item">
                        <input type="text" name="contract" id="contract" placeholder="Contract ID" class="btn btn-sm nav-down-field mr-5"/>
                        <!-- <select id="select-section">
                            <option value="">---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>                   -->
                    </li>
                    <li class="nav-item apply-filters-field">
                        <button type="button" class="btn btn-link text-dark fas fa-sync-alt mr-2 generate-mac-id"></button>
                        <button type="button" class="btn btn-sm apply-filters">Apply filters</button>
                    </li>
                </div>
                <li class="nav-item">
                <div class="ml-5"></div>
                </li>
                <li class="nav-item">
                <div class="ml-5"></div>
                </li>
                <li class="nav-item">
                <div class="ml-5"></div>
                </li>
                <li class="nav-item">
                <div class="ml-5"></div>
                </li>
                <li class="nav-item">
                <div class="ml-5"></div>
                </li>
                <li class="nav-item">
                <div class="ml-5"></div>
                </li>
                <li class="nav-item">
                <div class="ml-5"></div>
                </li>
                <li class="nav-item">
                <div class="reset-btn-area">
                    <button type="button" class="btn btn-sm reset-filters">Reset filters</button>
                </div>
                </li>
                </form>
            </ul>  
        </div>                              
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light pb-0 lowest-nav">
        <ul class="navbar-nav">
            <li class="nav-item pr-3">
                <button type="button" class="lowest-nav-button btn px-5 font-weight-bold">Tables</button>
            </li>
            <li class="nav-item">
                <button type="button" class="lowest-nav-button btn px-5 font-weight-bold">Graphs</button>
            </li>
        </ul>
    </nav>
</header>

<main>
    
    <div class="container highchart-container">
        <div class="row pt-5 mb-5">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="first-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>        
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="second-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="third-chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>       
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div id="fourth-chart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>        
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
    
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    
    <!-- <script src="path/to/jquery.easy-autocomplete.min.js"></script> -->
    <script src="node_modules/jquery/jquery.min.js"></script>  
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src='js/main.js'></script>
  
</body>
</html>