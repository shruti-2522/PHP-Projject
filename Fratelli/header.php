 
 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
            <a class="navbar-brand-text mx-2" align="right" style="color:white;"><b>FRATELLI CROP MANAGEMENT</b></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
               
                </div>
            </form>
            <!-- Navbar-->
                   <ul class="navbar-nav ml-auto ml-md-0">
                        <li>
                             <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </li>
                 <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      

                        <a class="dropdown-item" href="language.php">Home</a>
                     
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <?php 
                            if($_SESSION['plot_id']!=null)
                            {
                            ?>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Master Entry
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="fruit.php">Fruit/Variety</a>
                                    <a class="nav-link" href="plot.php">Plot</a>
                                     <a class="nav-link" href="equipment.php">Machine And Sprayer</a>
                                    <a class="nav-link" href="slury.php">Slurry</a>
                                     <a class="nav-link" href="work.php">Work Schedule</a>
                                    <a class="nav-link" href="worker.php">Workers</a>
                                     <a class="nav-link" href="item.php">Item</a>
                                    <a class="nav-link" href="inhouse_calibbration1.php">Inhouse Calibration</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Work Entry
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="purchase.php">Item Purchase</a>
                                    <a class="nav-link" href="prunning.php">Prunning</a>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Application
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="disease.php">Disease Control</a>
                                            <a class="nav-link" href="fertilizer.php">Fertilizer</a>
                                            <a class="nav-link" href="growth_regulator.php">Growth Regulator</a>
                                             <a class="nav-link" href="sluryapp.php">Slurry</a>
                                        </nav>
                                    </div>
                                     <a class="nav-link" href="irrigation.php">Irrigation</a>
                                      <a class="nav-link" href="inhouse1.php">Inhouse Calibration</a>
                                       <a class="nav-link" href="drip.php">Drip Observation</a>
                                        <a class="nav-link" href="crop.php">Crop Observation</a>
                                         <a class="nav-link" href="visit.php">Visit Records</a>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Analysis

                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="soil.php">Soil Analysis</a>
                                            <a class="nav-link" href="water.php">Water Analysis</a>
                                            <a class="nav-link" href="leaf.php">Leaf Petiole</a>
                                        </nav>
                                    </div><a class="nav-link" href="other_work.php">Other Work</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount" aria-expanded="false" aria-controls="collapseAccount">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Accounting
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a><div class="collapse" id="collapseAccount" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="account_grp.php">Account Group</a>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Ledger
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="add_led.php">Create Ledger</a>
                                            <a class="nav-link" href="view_led.php">Display Ledger</a>
                                            <a class="nav-link" href="editled.php">Edit Ledger</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Voucher
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="add_contra.php">Contra Entry</a>
                                            <a class="nav-link" href="All_voucher1.php">Credit Note</a>
                                            <a class="nav-link" href="All_voucher.php">Debit Note</a>
                                              <a class="nav-link" href="add_purchase1.php">Purchase</a>
                                            <a class="nav-link" href="add_sales1.php">Sales</a>
                                            <a class="nav-link" href="add_receipt.php">Receipt</a>
                                            <a class="nav-link" href="add_payment.php">Payment</a>
                                             <a class="nav-link" href="add_journal.php">Journal Entry</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href='reports.php'>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Reports
                            </a>
                            <a class="nav-link" href="harvest1.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Harvesting Records
                            </a>

                               <a class="nav-link" href="draft.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Draft
                            </a>
                            
                             <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Information
                            </a>
                             <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    My Account
                            </a>
                            
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                  
                </nav></div>
            </div>

                   <div id="layoutSidenav_content" style="margin-left: 20%;margin-top: 5%">
                <main>
                    <div class="container-fluid">
                   