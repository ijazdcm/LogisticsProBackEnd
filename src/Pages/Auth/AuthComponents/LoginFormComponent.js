import { cilLockLocked, cilUser } from '@coreui/icons'
import CIcon from '@coreui/icons-react'
import { CButton, CForm, CFormInput, CImage, CInputGroup, CInputGroupText } from '@coreui/react'
import React from 'react'

const LoginFormComponent = ({ handleLogin, state, setState,setForgetPassword }) => {
  return (
    <>
      <CForm className="text-center" onSubmit={handleLogin}>
        <div className="d-flex justify-content-around">
          <CImage
            rounded
            thumbnail
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGq3esvd2vR31jkhoULZUGIoCZcjjMJRIT0G1HpW6AyRjUWqebVB0RLCzGXjrC-CbQ9A4&usqp=CAU"
            width={150}
            height={150}
          />
          <h2 className="mt-5">NAGA LOGISTICS PRO</h2>
        </div>
        <p className="text-medium-emphasis mt-4">ADMIN & USER LOGIN</p>
        <div className="container">
          {state.error && <div className="text-danger">{state.error}</div>}
          <div className="row">
            <div className="col-md-8 offset-md-2">
              <CInputGroup className="mb-4">
                <CInputGroupText>
                  <CIcon icon={cilUser} />
                </CInputGroupText>
                <CFormInput
                  placeholder="Username"
                  value={state.username}
                  required
                  onChange={(e) => setState({ ...state, username: e.target.value })}
                />
              </CInputGroup>
              <CInputGroup className="mb-4">
                <CInputGroupText>
                  <CIcon icon={cilLockLocked} />
                </CInputGroupText>
                <CFormInput
                  required
                  type="password"
                  placeholder="Password"
                  value={state.password}
                  onChange={(e) => setState({ ...state, password: e.target.value })}
                />
              </CInputGroup>
            </div>
          </div>
          <div className="row">
            <div className="float-right">
              <CButton type="submit" color="primary" className="px-4">
                Login
              </CButton>
              <CButton type="button" onClick={()=>setForgetPassword(true)} color="primary" className="px-4">
                Forget Password
              </CButton>
            </div>
          </div>
        </div>
      </CForm>
    </>
  )
}

export default LoginFormComponent
