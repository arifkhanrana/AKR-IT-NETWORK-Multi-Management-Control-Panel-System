# VPN Integration (Python example for OpenVPN)
import openvpn_api
def create_vpn_account(username, password, duration):
    vpn = openvpn_api.VPN('vpn-server-ip', 1194)
    vpn.connect()
    vpn.authenticate('admin', 'securepass')
    vpn.add_user(username, password, 
                 expiry=datetime.now() + timedelta(days=duration))
    vpn.disconnect()