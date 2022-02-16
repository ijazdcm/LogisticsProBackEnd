//Created By Mariavananraj
import AppConfig from "src/AppConfig";
import api from "../Config";

const STATUS_URL =AppConfig.api.baseUrl+ '/status' 

class StatusApi {
  getStatus() {
    return api.get(STATUS_URL)
  }

  createStatus(value) {
    return api.post(STATUS_URL, value)
  }

  getStatusById(StatusId) {
    return api.get(STATUS_URL + '/' + StatusId)
  }

  updateStatus(StatusDetails, StatusId) {
    return api.put(STATUS_URL + '/' + StatusId, StatusDetails)
  }

  deleteStatus(StatusId) {
    return api.delete(STATUS_URL + '/' + StatusId)
  }
}

export default new StatusApi()
