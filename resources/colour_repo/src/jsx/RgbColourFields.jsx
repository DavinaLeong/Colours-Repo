var RgbColourFields = React.createClass({
    logToConsole: function (function_name, message_to_log)
    {
        if (message_to_log)
        {
            console.log('RgbColourFields' + '.' + function_name + ' - ' + message_to_log);
        }
        else
        {
            console.log('RgbColourFields' + '.' + function_name);
        }
    },
    render: function ()
    {
        this.logToConsole('render');
        return (
            <fieldset>
                <legend>Values</legend>
                <div className="row">
                    <div className="col-md-5">
                        <div className="form-group">
                            <label className="col-md-3 control-label" htmlFor="red_255">Red <span className="text-danger">*</span></label>
                            <div className="col-md-9">
                                <input className="form-control" type="number" step="1" id="red_255" name="red_255" placeholder="0"
                                       required min="0" max="255" data-parsley-type="digits" />
                            </div>
                        </div>

                        <div className="form-group">
                            <label className="col-md-3 control-label" htmlFor="green_255">Green <span className="text-danger">*</span></label>
                            <div className="col-md-9">
                                <input className="form-control" type="number" step="1" id="green_255" name="green_255" placeholder="0"
                                       required min="0" max="255" data-parsley-type="digits" />
                            </div>
                        </div>

                        <div className="form-group">
                            <label className="col-md-3 control-label" htmlFor="blue_255">Blue <span className="text-danger">*</span></label>
                            <div className="col-md-9">
                                <input className="form-control" type="number" step="1" id="blue_255" name="blue_255" placeholder="0"
                                       required min="0" max="255" data-parsley-type="digits" />
                            </div>
                        </div>

                        <div className="form-group">
                            <div className="col-md-9 col-md-offset-3">
                                <p className="help-block">(0 - 254)</p>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-5">

                    </div>
                    <div className="col-md-2">

                    </div>
                </div>
                <div className="row">
                    <div className="col-md-12">
                        <div className="form-group">
                            <label className="col-md-2 control-label" htmlFor="hex">Hexadecimal</label>
                            <div className="col-md-10">
                                <input className="form-control" type="text" id="hex" name="hex" placeholder="#000000" maxlength="7"
                                       data-parsley-pattern={this.props.REGEX_PARSLEY_COLOUR_HEX} readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        );
    }
});