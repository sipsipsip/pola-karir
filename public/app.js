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
var TambahRencanaKarir = require('./src/pages/TambahRencanaKarir.page');
var DetailRencanaKarir = require('./src/pages/DetailRencanaKarir.page');
var RencanaKarirListForManajer = require('./src/pages/RencanaKarirListForManajer.page');
var PilihAtasan = require('./src/pages/PilihAtasan.page');
var EditRencanaKarir = require('./src/pages/EditRencanaKarir.page');


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
        <Route path="tambah-rencana-karir" component={TambahRencanaKarir}/>
        <Route path="rencana-karir/:id/detail" component={DetailRencanaKarir} />
        <Route path="rencana-karir/:id/edit" component={EditRencanaKarir} />
        <Route path="manajer/rencana-karir" component={RencanaKarirListForManajer} />
        <Route path="admin/pilih-atasan" component={PilihAtasan} />
    </Route>
  </Router>
 ),document.getElementById('react-render'));
