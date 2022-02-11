import AppConfig from 'src/AppConfig'
import api from '../Config'

const DOCS_VERIFY_URL = AppConfig.api.baseUrl + '/DocumentVerification/'

class DocsVerifyService {
  getDocsVerifyTableData() {
    return api.get(DOCS_VERIFY_URL)
  }
  getSingleVehicleInfo(id) {
    return api.get(DOCS_VERIFY_URL + id)
  }
  addDocumentVerificationData(data) {
    return api.post(DOCS_VERIFY_URL, data)
  }
}

export default new DocsVerifyService()
