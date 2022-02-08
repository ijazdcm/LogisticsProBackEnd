import { cilAt, cilLockLocked, cilUser } from '@coreui/icons'
import CIcon from '@coreui/icons-react'
import {
  CButton,
  CForm,
  CFormInput,
  CImage,
  CInputGroup,
  CInputGroupText,
  CSpinner,
} from '@coreui/react'
import React from 'react'
import EmailComponent from './InternalComponents/EmailComponent'
import NewPasswordComponent from './InternalComponents/NewPasswordComponent'
import OtpComponent from './InternalComponents/OtpComponent'

const ForgetPasswordFromComponent = ({
  handleForgetPassword,
  state,
  setState,
  verifyOtp,
  ChangePassword,
  forgetPassword
}) => {
  return (
    <>
         {(forgetPassword && !state.otpPage) && <EmailComponent
            handleForgetPassword={handleForgetPassword}
            state={state}
            setState={setState}
          />}
        {(state.otpPage && forgetPassword) && (<OtpComponent verifyOtp={verifyOtp} state={state} setState={setState} />)}
        {(state.confirmOtp && state.otpPage) && <NewPasswordComponent  ChangePassword={ChangePassword} state={state} setState={setState} />}

    </>
  )
}

export default ForgetPasswordFromComponent
