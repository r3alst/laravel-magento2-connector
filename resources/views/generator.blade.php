<!doctype html>
<html>
    <head>
        <title>Magento 2 Module Generator</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            .flex {
                display: flex;
            }
            .flex-wrap {
                flex-wrap: wrap;
            }
            .items-center {
                align-items: center;
            }
            .justify-center {
                justify-content: center;
            }
            .bg-gray {
                background-color: #ccc;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand">Module Generator</a>
            </div>
        </div>
        <div class="container">
            <div class="flex flex-wrap items-center justify-center bg-gray">
                <form method="POST" id="generator_form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="vendor_entry">Vendor</label>
                        <input id="vendor_entry" name="vendor_entry" class="form-control" type="text" value="R3alst"/>
                    </div>
                    <div class="form-group">
                        <label for="moduleName_entry">Module name</label>
                        <input id="moduleName_entry" name="moduleName_entry" class="form-control" type="text" value="Integration"/>
                    </div>
                    <div class="form-group">
                        <label for="integrationName_entry">Integration Name</label>
                        <input id="integrationName_entry" name="integrationName_entry" class="form-control" type="text" value="r3alstIntegration" />
                    </div>
                    <div class="form-group">
                        <label for="contactEmail_entry">Contact Email</label>
                        <input id="contactEmail_entry" name="contactEmail_entry" class="form-control" type="text" value="r3alst@gmail.com" />
                    </div>
                    <div class="form-group">
                        <label for="endpointUrl_entry">Endpoint Url</label>
                        <input id="endpointUrl_entry" name="endpointUrl_entry" class="form-control" type="text" value="https://m2connector.modsolutionz.com/api/magento2/v1/oauth/callback" />
                    </div>
                    <div class="form-group">
                        <label for="identityUrl_entry">Identity Url</label>
                        <input id="identityUrl_entry" name="identityUrl_entry" class="form-control" type="text" value="https://m2connector.modsolutionz.com/magento2/login" />
                    </div>
                    <div class="form-group">
                        <label for="resourcesList_entry">Resources</label>
                        <select class="form-control" name="resourcesList_entry[]" id="resourcesList_entry" style="height: 400px" multiple>
                            @foreach($resources as $resource)
                                <option value="{{ $resource }}">{{ $resource }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Generate &amp; Download</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>