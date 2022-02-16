
import React from 'react'
import { Redirect, Route } from "react-router-dom";

const ProtectedRoutes = ({auth,component:Component,...rest}) => {


  return (
     <Route {...rest} render={(props)=>{
       if(auth) return <Component {...props} />
       if(!auth) return <Redirect from='/dashboard' to="/login" />

     }} />
   );
}

export default ProtectedRoutes;
