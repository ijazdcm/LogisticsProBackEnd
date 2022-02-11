export default function DocumentVerificationValidation(values, isTouched) {
  const errors = {}

  if (isTouched.panNumber && !values.panNumber) {
    errors.panNumber = 'Required'
  } else if (isTouched.panNumber && !/^[A-Z]{5}[\d]{4}[A-Z]{1}$/.test(values.panNumber)) {
    errors.panNumber = 'Must Like "AMIPR8417L"'
  }

  if (isTouched.license && !values.license) {
    errors.license = 'Required'
  }

  if (isTouched.rcFront && !values.rcFront) {
    errors.rcFront = 'Required'
  }
  if (isTouched.rcBack && !values.rcBack) {
    errors.rcBack = 'Required'
  }
  if (isTouched.insurance && !values.insurance) {
    errors.insurance = 'Required'
  }
  if (isTouched.insuranceValid && !values.insuranceValid) {
    errors.insuranceValid = 'Required'
  }
  if (isTouched.TDSfront && !values.TDSfront) {
    errors.TDSfront = 'Required'
  }
  if (isTouched.TDSback && !values.TDSback) {
    errors.TDSback = 'Required'
  }
  if (isTouched.transportShed && !values.transportShed) {
    errors.transportShed = 'Required'
  }
  if (isTouched.shedName && !values.shedName) {
    errors.shedName = 'Required'
  }
  if (isTouched.ownershipTrans && !values.ownershipTrans) {
    errors.ownershipTrans = 'Required'
  }
  if (isTouched.freightRate && !values.freightRate) {
    errors.freightRate = 'Required'
  }

  //vehicle type validation rule
  if (isTouched.ShedType && values.ShedType === '0') {
    errors.ShedType = 'Choose Type'
  }
  if (isTouched.ShedName && !values.ShedName) {
    errors.ShedName = 'Required'
  } else if (isTouched.ShedName && !/^[a-zA-Z ]+$/.test(values.ShedName)) {
    errors.ShedName = 'Must Have Letters & Space'
  }
  if (isTouched.ShedOwnerName && !values.ShedOwnerName) {
    errors.ShedOwnerName = 'Required'
  } else if (isTouched.ShedOwnerName && !/^[a-zA-Z ]+$/.test(values.ShedOwnerName)) {
    errors.ShedOwnerName = 'Must Have Letters & Space'
  }
  if (isTouched.ShedOwnerMobileNumber2 && !values.ShedOwnerMobileNumber2) {
    errors.ShedOwnerMobileNumber2 = 'Mobile Number 2 is required'
  } else if (
    isTouched.ShedOwnerMobileNumber2 &&
    !/^[\d]{10}$/.test(values.ShedOwnerMobileNumber2)
  ) {
    errors.ShedOwnerMobileNumber2 = 'Must Have 10 Digit Numeric'
  }
  if (isTouched.ShedOwnerMobileNumber1 && !values.ShedOwnerMobileNumber1) {
    errors.ShedOwnerMobileNumber1 = 'Required'
  } else if (
    isTouched.ShedOwnerMobileNumber2 &&
    !/^[\d]{10}$/.test(values.ShedOwnerMobileNumber1)
  ) {
    errors.ShedOwnerMobileNumber1 = 'Must Have 10 Digit Numeric'
  }
  if (isTouched.ShedOwnerAddress && !values.ShedOwnerAddress) {
    errors.ShedOwnerAddress = 'Required'
  }
  if (isTouched.ShedOwnerPhoto && !values.ShedOwnerPhoto) {
    errors.ShedOwnerPhoto = 'Required'
  }

  return errors
}
