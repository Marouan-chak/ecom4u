<?php include "config.php"; ?>
<?xml version"1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.1//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-2.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php $_SESSION['lang']?>" xmlns:contact="http://www.w3.org/2000/10/swap/pim/contact#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:xsd="http://www.w3.org/2001/XMLSchema#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:foaf="http://xmlns.com/foaf/0.1/">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" http-equiv="Content-Type" />
    <meta name="description" xml:lang="fr" content="Un portfolio de CHAKRAN Marouan dans le cadre du cours du web sémantique." />
    <meta name="description" xml:lang="en" content="A portfolio of CHAKRAN Marouan as part of the semantic web course." />
    <meta name="robots" content="index, follow, archive" />
    <meta name="keywords" content="Chakran Marouan, Portfolio, web sémantique, ingénieur, Computer science, RDF, RDFS, RDFa, OWL, SVG, SPARQL,XML, XSD, DTD" />
    <meta property="dc:creator" content="CHAKRAN Marouan" />
    <meta property="og:title" xml:lang="fr" content="Marouan Chakran | Portfolio | Ingénieur Informatique et Réseaux" />
    <meta property="og:url" content="web-sem-tp.000webhostapp.com" />
    <meta property="og:site_name" xml:lang="fr" content="Portfolio personnel Marouan Chakran" />
    <meta property="og:description" xml:lang="fr" content="Portfolio de Marouan Chakran" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:locale:alternate" content="en_GB" />
    <title><?php echo $lang['title'] ?></title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/mystyle.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>

<body  vocab="http://schema.org/" typeof="AboutPage" resource="#portfolioAbout">
    <div class="footer bg-dark"> <a href="index.php?lang=en" dir="<?php echo $lang['dir']?>"><?php echo $lang['lang_en'] ?></a> <a href="index.php?lang=fr" dir="<?php echo $lang['dir']?>"><?php echo $lang['lang_fr'] ?></a> <a href="index.php?lang=ar" dir="<?php echo $lang['dir']?>"><?php echo $lang['lang_ar'] ?></a> </div>
    <div id="Header">
        <nav class="navbar navbar-dark navbar-expand-sm bg-dark fixed-top">f
            <div class="container"> <button class="navbar-toggler" data-toggle="collapse" data-target="#Navbar"> <span class="navbar-toggler-icon"></span> </button> <a href="#" class="navbar-brand">
                    <h3>Portfolio</h3>
                </a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="#About" class="nav-link" dir="<?php echo $lang['dir']?>"><?php echo $lang['about'] ?></a></li>
                        <li class="nav-item"><a href="#Skills" class="nav-link" dir="<?php echo $lang['dir']?>"><?php echo $lang['skills'] ?></a></li>
                        <li class="nav-item"><a href="#Experience" class="nav-link" dir="<?php echo $lang['dir']?>"><?php echo $lang['experiences'] ?></a></li>
                        <li class="nav-item"><a href="cv-<?php echo $_SESSION['lang'] ?>.xml" class="nav-link" dir="<?php echo $lang['dir']?>"><?php echo $lang['cv'] ?></a></li>
                        <li class="nav-item"><a href="web-sem.php" class="nav-link" dir="<?php echo $lang['dir']?>"><?php echo $lang['web-sem'] ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?lang=en"><span class='icon1'></span></a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?lang=fr"><span class='icon2'></span></a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?lang=ar"><span class='icon3'></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="bg-item"></div>
    <div id="About">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="AboutData">
                        <div class="card bg-white">
                            <div class="card-title my-5">
                                <div class="media"> <img src="img/me.jpg" alt="marouan" width="250" height="250" class="img-fluid mx-5 rounded-top d-none d-lg-block">
                                    <div class="media-body" >
                                        <h3 class="display-4 ml-5" property="foaf:name"><?php echo $lang['me'] ?></h3>
                                        <p class="text-muted ml-5 mr-3" dir="<?php echo $lang['dir']?>"><?php echo $lang['whoami'] ?></p>
                                        <div class="container">
                                            <table class="table table-responsive ml-4">
                                                <tr>
                                                    <td class="text-muted" dir="<?php echo $lang['dir']?>"><?php echo $lang['age'] ?></td>
                                                    <td>:</td>
                                                    <td>22</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted" dir="<?php echo $lang['dir']?>"><?php echo $lang['email'] ?></td>
                                                    <td rel="foaf:email" resource="marouane.chakran@gmail.com">:</td>
                                                    <td>marouane.chakran@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted">Linkedin</td>
                                                    <td>:</td>
                                                    <td><span property="foaf:firstName">Marouan</span> <span property="foaf:lastName">Chakran</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted" dir="<?php echo $lang['dir']?>"><?php echo $lang['phone'] ?></td>
                                                    <td>:</td>
                                                    <td rel="foaf:phone" resource="tel:+33758059873">+33 7 58 05 98 73</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-danger"> <a href="#"><i class="fa fa-facebook fa-2x mx-3"></i></a> <a href="#"><i class="fa fa-github fa-2x mx-3"></i></a> <a href="#"><i class="fa fa-instagram fa-2x mx-3"></i></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col"> <span class="bg-danger text-white" dir="<?php echo $lang['dir']?>"><?php echo $lang['about'] ?></span>
                    <hr class="bg-danger">
                    <p class="lead text-justify" dir="<?php echo $lang['dir']?>"><?php echo $lang['resume'] ?> </p>
                </div>
            </div>
        </div>
    </div>
    <div id="Skills" class="mt-5">
        <div class="container"> <span class="bg-primary text-white" dir="<?php echo $lang['dir']?>"><?php echo $lang['skills'] ?></span>
            <hr class="bg-primary">
            <div class="row">
                <div class="col">
                    <div class="card bg-white">
                        <h3 class="ml-3 my-3">HTML5, CSS3, JAVASCRIPT, BOOTSTRAP & JQUERY</h3>
                        <div class="progress mx-3">
                            <div class="progress progress-bar bg-dark" style="width:100%;">100%</div>
                        </div>
                        <h3 class="ml-3 my-3">Docker containers</h3>
                        <div class="progress mx-3">
                            <div class="progress progress-bar bg-dark" style="width:90%;">90%</div>
                        </div>
                        <h3 class="ml-3 my-3">Kubernetes Orchestration, Rancher & Openshift</h3>
                        <div class="progress mx-3">
                            <div class="progress progress-bar bg-dark " style="width:90%;">90%</div>
                        </div>
                        <h3 class="ml-3 my-3" dir="<?php echo $lang['dir']?>"><?php echo $lang['c'] ?></h3>
                        <div class="progress mx-3">
                            <div class="progress progress-bar bg-dark" style="width:90%;">90%</div>
                        </div>
                        <h3 class="ml-3 my-3" dir="<?php echo $lang['dir']?>"><?php echo $lang['java'] ?></h3>
                        <div class="progress mx-3">
                            <div class="progress progress-bar bg-dark" style="width:80%;">80%</div>
                        </div>
                        <h3 class="ml-3 my-3">Shell scripting</h3>
                        <div class="progress mx-3">
                            <div class="progress progress-bar bg-dark" style="width:90%;">90%</div>
                        </div>
                        <h3 class="ml-3 my-3">Linux</h3>
                        <div class="progress mx-3">
                            <div class="progress progress-bar bg-dark" style="width:90%;">90%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Experience">
        <div class="container mt-5"> <span class="text-white" style="background-color: #2980f2;" dir="<?php echo $lang['dir']?>"><?php echo $lang['experiences'] ?> </span>
            <hr style="background-color: #2980f2;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card bg-white"> <img src="img/sagemcom.png" width="320" height="150" class="img-fluid my-5 d-flex m-auto py-3" alt="sagemcom logo">
                        <h3 class="text-center text-secondary" dir="<?php echo $lang['dir']?>"><?php echo $lang['deployment'] ?></h3>
                        <p class="lead text-justify p-3" dir="<?php echo $lang['dir']?>"><?php echo $lang['work'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark">
        <div class="row">
            <div class="col">
                <div class="container">
                    <p class="text-white pt-3 text-center" dir="<?php echo $lang['dir']?>"></p>
                    <p class="text-white pt-3 text-center" dir="<?php echo $lang['dir']?>" property="dc:rights"> &copy; <?php echo $lang['designed'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>