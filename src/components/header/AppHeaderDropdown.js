import React from 'react'
import {
  CAvatar,
  CBadge,
  CButton,
  CDropdown,
  CDropdownDivider,
  CDropdownHeader,
  CDropdownItem,
  CDropdownMenu,
  CDropdownToggle,
} from '@coreui/react'
import {
  cilBell,
  cilCreditCard,
  cilCommentSquare,
  cilEnvelopeOpen,
  cilFile,
  cilLockLocked,
  cilSettings,
  cilTask,
  cilUser,
} from '@coreui/icons'
import CIcon from '@coreui/icons-react'
import LocalStorageService from 'src/Service/LocalStoage'
import AuthService from 'src/Service/Auth/AuthService'
// import avatar8 from 'https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png'

const AppHeaderDropdown = () => {


  //section for handling Logout by removeing the auth_token

  function logout()
  {
    AuthService.logout().then((res)=>{

      if(res.status==204)
      {
        LocalStorageService.clear()
        window.location.href="/login";
      }

    })

  }


  return (
    <CDropdown variant="nav-item">
      <CDropdownToggle placement="bottom-end" className="py-0" caret={false}>
        <CAvatar src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGq3esvd2vR31jkhoULZUGIoCZcjjMJRIT0G1HpW6AyRjUWqebVB0RLCzGXjrC-CbQ9A4&usqp=CAU" size="md" />
      </CDropdownToggle>
      <CDropdownMenu className="pt-0" placement="bottom-end">
        <CDropdownHeader className="bg-light fw-semibold py-2"><CButton onClick={logout} type='button'>
          <CIcon icon={cilLockLocked}  className="me-2" />
             Logout
        </CButton></CDropdownHeader>

      </CDropdownMenu>
    </CDropdown>
  )
}

export default AppHeaderDropdown
