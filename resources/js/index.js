import ReactDOM from "react-dom";
import React from "react";
import Example from "./components/Example";
import Component2 from "./components/Component2";
import Component3 from "./components/Component3";
import Menuitem from "./components/Menuitem";

if (document.getElementById('reactcomponent')) {
    ReactDOM.render(<Example />, document.getElementById('reactcomponent'));
}


if (document.getElementById('reactcomponent2')) {
    ReactDOM.render(<Component2 />, document.getElementById('reactcomponent2'));
}


if (document.getElementById('reactcomponent3')) {
    ReactDOM.render(<Component3 />, document.getElementById('reactcomponent3'));
}

if (document.getElementById('menuitem')) {
    ReactDOM.render(<Menuitem />, document.getElementById('menuitem'));
}
