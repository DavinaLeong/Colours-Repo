var RgbColourFields = React.createClass({
    getInitialState: function()
    {
        if(this.props.colour)
        {
            return {
                red_255: this.props.colour.red_255,
                green_255: this.props.colour.green_255,
                blue_255: this.props.colour.blue_255,

                red_ratio: this.props.colour.red_ratio,
                green_ratio: this.props.colour.green_ratio,
                blue_ratio: this.props.colour.blue_ratio,

                hex: this.props.colour.hex
            };
        }
        else
        {
            return {
                red_255: null,
                green_255: null,
                blue_255: null,

                red_ratio: null,
                green_ratio: null,
                blue_ratio: null,

                hex: null
            };
        }
    },
    getRatio: function(value)
    {
        if(value >= 0 && value <= 255)
        {
            return numeral(value / 255).format('0.00');
        }
        else
        {
            throw 'InvalidValueError: Value must be between 0 and 255 (inclusive).';
        }
    },
    onRed255Change: function(e)
    {
        this.setState({
            red_255: e.target.value,
            red_ratio: this.getRatio(e.target.value)
        }, this.updateHex());
    },
    onGreen255Change: function(e)
    {
        this.setState({
            green_255: e.target.value,
            green_ratio: this.getRatio(e.target.value)
        }, this.updateHex());
    },
    onBlue255Change: function(e)
    {
        this.setState({
            blue_255: e.target.value,
            blue_ratio: this.getRatio(e.target.value)
        }, this.updateHex());
    },
    updateHex: function()
    {
        var red = Math.abs(this.state.red_255).toString(16);
        var green = Math.abs(this.state.green_255).toString(16);
        var blue = Math.abs(this.state.blue_255).toString(16);

        if(red.length < 2)
        {
            red += '0';
        }
        if(green.length < 2)
        {
            green += '0';
        }
        if(blue.length < 2)
        {
            blue += '0';
        }

        this.setState({
            hex: '#' + red + green + blue,
            red_changed: false,
            green_changed: false,
            blue_changed: false
        });
    },
    render: function ()
    {
        return (
            <fieldset>
                <legend>Values</legend>
                <div className="row">
                    <div className="col-md-10">
                        <div className="form-group">

                            <div className="col-md-2">
                                <label className="control-label">RGB Values <span className="text-danger">*</span></label>
                                <p className="help-block">(0 - 255)</p>
                            </div>
                            <div className="col-md-10">
                                <div className="row">
                                    <div className="col-md-4">
                                        <input className="form-control" type="number" step="1" id="red_255" name="red_255"
                                               placeholder="0" required min="0" max="255" data-parsley-type="digits"
                                               value={this.state.red_255} onChange={this.onRed255Change} />
                                    </div>

                                    <div className="col-md-4">
                                        <input className="form-control" type="number" step="1" id="green_255" name="green_255"
                                               placeholder="0" required min="0" max="255" data-parsley-type="digits"
                                               value={this.state.green_255} onChange={this.onGreen255Change} />
                                    </div>

                                    <div className="col-md-4">
                                        <input className="form-control" type="number" step="1" id="blue_255" name="blue_255"
                                               placeholder="0" required min="0" max="255" data-parsley-type="digits"
                                               value={this.state.blue_255} onChange={this.onBlue255Change} />
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div className="form-group">
                            
                            <div className="col-md-2">
                                <label className="control-label">RGB Ratio</label>
                                <p className="help-block">(0.00 - 1.00)</p>
                            </div>
                            <div className="col-md-10">
                                <div className="row">

                                    <div className="col-md-4">
                                        <input className="form-control" type="number" step="0.01" id="red_ratio" name="red_ratio"
                                               placeholder="0.00" min="0" max="1" data-parsley-type="number"
                                               value={this.state.red_ratio} readOnly />
                                    </div>

                                    <div className="col-md-4">
                                        <input className="form-control" type="number" step="0.01" id="green_ratio" name="green_ratio"
                                               placeholder="0.00" min="0" max="1" data-parsley-type="number"
                                               value={this.state.green_ratio} readOnly />
                                    </div>

                                    <div className="col-md-4">
                                        <input className="form-control" type="number" step="0.01" id="blue_ratio" name="blue_ratio"
                                               placeholder="0.00" min="0" max="1" data-parsley-type="number"
                                               value={this.state.blue_ratio} readOnly />
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>

                        <div className="form-group">

                            <label className="col-md-2 control-label" htmlFor="hex">Hexadecimal</label>
                            <div className="col-md-10">
                                <input className="form-control" type="text" id="hex" name="hex" placeholder="#000000" maxLength="7"
                                       data-parsley-pattern={this.props.REGEX_PARSLEY_COLOUR_HEX} value={this.state.hex} readOnly />
                            </div>

                        </div>

                    </div>
                    <div className="col-md-2" style={{height: '280px'}}>
                        <div id="cr-foreground-sample" style={{color: this.state.hex}}>
                            Foreground
                        </div>
                        <div id="cr-background-sample" style={{background: this.state.hex}}>
                            Background
                        </div>
                    </div>
                </div>
            </fieldset>
        );
    }
});