import { CCol, CFormInput, CFormLabel, CFormSelect } from '@coreui/react'
import React, { useEffect, useState } from 'react'
import ParkingYardGateService from 'src/Service/ParkingYardGate/ParkingYardGateService'
import validate from 'src/Utils/Validation'
const OwnAndContractSection = ({
  errors,
  onFocus,
  onBlur,
  handleChange,
  values,
  isTouched,
  setIsTouched,
  setErrors,
}) => {
  const [vehicleByType, setVehicleByType] = useState([])
  const [vehicleCapacityByVId, setVehicleCapacityByVId] = useState(0)
  const [driver, setDriver] = useState([])
  const [driverPhoneNumberById, setDriverPhoneNumberById] = useState('')

  useEffect(() => {
    // setIsTouched({})
    setErrors({})
    //fetch to get Vehicles list form master by type Own or Contract
    isTouched.partyName = true
    isTouched.vehicleBody = true
    ParkingYardGateService.getVehiclebyType(values.vehicleType).then((res) => {
      setVehicleByType(res.data.data)
    })
  }, [values.vehicleType])

  useEffect(() => {
    if (values.vehicleId) {
      //fetch by VehicleId to get Capacity info of vehicle & Vehicle Number

      ParkingYardGateService.getVehicleInfoById(values.vehicleId).then((res) => {
        isTouched.vehicleCapacity = true
        isTouched.vehicleNumber = true
        values.vehicleNumber = res.data.data.vehicle_number
        values.vehicleCapacity = res.data.data.vehicle_capacity_info.id
        setVehicleCapacityByVId(res.data.data.vehicle_capacity_info.capacity)
      })
    }
  }, [values.vehicleId])

  useEffect(() => {
    //fetch to get Drivers list form master
    ParkingYardGateService.getDrivers().then((res) => {
      setDriver(res.data.data)
    })
  }, [])

  useEffect(() => {
    if (values.driverId) {
      //fetch to get Drivers info list form master by id
      ParkingYardGateService.getDriverInfoById(values.driverId).then((res) => {
        isTouched.driverPhoneNumber = true
        values.driverPhoneNumber = res.data.data.driver_phone_1
        isTouched.driverName = true
        values.driverName = res.data.data.driver_name
        setDriverPhoneNumberById(res.data.data.driver_phone_1)
      })
    }
  }, [values.driverId])

  return (
    <>
      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="vehicleId">
          Vehicle Number*
          {errors.vehicleId && <span className="small text-danger">{errors.vehicleId}</span>}
        </CFormLabel>
        <CFormSelect
          size="sm"
          name="vehicleId"
          id="vehicleId"
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          value={values.vehicleId}
          className={`${errors.vehicleId && 'is-invalid'}`}
          aria-label="Small select example"
        >
          <option value="">Select...</option>
          {vehicleByType.map(({ vehicle_id, vehicle_number }) => {
            return (
              <>
                <option key={vehicle_id} value={vehicle_id}>
                  {vehicle_number}
                </option>
              </>
            )
          })}
        </CFormSelect>
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="vCap">Vehicle Capacity In MTS*</CFormLabel>
        <CFormInput
          size="sm"
          id="vCap"
          name="vehicleCapacityView"
          value={vehicleCapacityByVId + '-TON'}
          readOnly
        />
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="driverId">
          Driver Name*{' '}
          {errors.driverId && <span className="small text-danger">{errors.driverId}</span>}
        </CFormLabel>
        <CFormSelect
          size="sm"
          name="driverId"
          id="driverId"
          maxLength={30}
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          value={values.driverId}
          className={`${errors.driverId && 'is-invalid'}`}
          aria-label="Small select example"
        >
          <option value={''}>Select...</option>
          {driver.map(({ driver_id, driver_name }) => {
            return (
              <>
                <option key={driver_id} value={driver_id}>
                  {driver_name}
                </option>
              </>
            )
          })}
        </CFormSelect>
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="driverPhoneNumber">Driver Contact Number</CFormLabel>
        <CFormInput
          size="sm"
          name="driverPhoneNumberByID"
          maxLength={10}
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          value={driverPhoneNumberById}
          readOnly
        />
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="odometerKm">
          Odometer KM*{' '}
          {errors.odometerKm && <span className="small text-danger">{errors.odometerKm}</span>}
        </CFormLabel>
        <CFormInput
          size="sm"
          name="odometerKm"
          id="odometerKm"
          maxLength={6}
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          value={values.odometerKm}
        />
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="odoImg">
          Odometer Photo*{' '}
          {errors.odometerImg && <span className="small text-danger">{errors.odometerImg}</span>}
        </CFormLabel>
        <CFormInput
          type="file"
          name="odometerImg"
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          className={`${errors.odometerImg && 'is-invalid'}`}
          size="sm"
          id="odoImg"
          accept=".jpg,.jpeg"
        />
      </CCol>
    </>
  )
}

export default OwnAndContractSection
