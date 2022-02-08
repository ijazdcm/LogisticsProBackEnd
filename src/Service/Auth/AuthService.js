import AppConfig from 'src/AppConfig'
import api from '../Config'
const AUTH_API_BASE_URL = AppConfig.api.baseUrl + '/admin/login'
const AUTH_API_BASE_URL_LOGOUT = AppConfig.api.baseUrl + '/admin/logout'
const AUTH_API_BASE_FORGET_PASSWORD_URL = AppConfig.api.baseUrl + '/user/forget-password'
const AUTH_API_BASE_VERIFY_OTP_URL = AppConfig.api.baseUrl + '/user/verify-otp'
class AuthService {
  login(data) {
    return api.post(AUTH_API_BASE_URL, data)
  }

  logout() {
    return api.post(AUTH_API_BASE_URL_LOGOUT)
  }

  forgetPassword(data) {
    return api.post(AUTH_API_BASE_FORGET_PASSWORD_URL,data)
  }

   verifyOtp(data)
   {
    return api.post(AUTH_API_BASE_VERIFY_OTP_URL,data)
   }
}

export default new AuthService()
