var React = require('react');
var ReactDOM = require('react-dom');
var InjectTapEventPlugin = require('react-tap-event-plugin');


var ReactRouter = require('react-router');
var Router = ReactRouter.Router;
var RouteHandler = ReactRouter.RouteHandler;
var Route = ReactRouter.Route;

var Header = require('./src/components/Header.react');

// Pages
var HalamanUtama = require('./src/pages/HalamanUtama.page');



var App = React.createClass({
    render: function(){
        return (
            <div>
                {this.props.children}
            </div>
        );
    }
});

var About = React.createClass({
    render: function(){
        return (
            <div>
                About
            </div>
        );
    }
});




InjectTapEventPlugin();

ReactDOM.render((
  <Router>
    <Route path="/" component={App}>
        <Route path="about" component={About}/>
        <Route path="utama" component={HalamanUtama}/>
    </Route>
  </Router>
 ),document.getElementById('react-render'));
