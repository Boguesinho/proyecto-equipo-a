using proyectoRed.Models;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace proyectoRed.VentanasIntlok
{
    /// <summary>
    /// Lógica de interacción para RegistraUsuario.xaml
    /// </summary>
    public partial class RegistraUsuario : Window
    {
        public RegistraUsuario()
        {
            InitializeComponent();
        }

        public bool validacionCampos()
        {
            if (txtBox_Apellidos.Text.Length>0 && txtBox_Nombre.Text.Length > 0 && txtBox_Correo.Text.Length > 0 &&
                txtBox_Telefono.Text.Length > 0 && txtBox_Usuario.Text.Length > 0 && txt_Password.Password.Length > 0
                 && txt_PasswordConfirm.Password.Length > 0)
            {
                return true;
            }
            return false;
        }

        public bool validacionContrasena()
        {
            if (txt_Password.Password.Equals(txt_PasswordConfirm.Password))
            {
                return true;
            }
            return false;
        }

        private void btn_Registrar_Click(object sender, RoutedEventArgs e)
        {
            if (validacionCampos())
            {
                if (validacionContrasena())
                {
                    var client = new RestClient(Constant.url);
                    

                    var requestCuenta = new RestRequest("create", Method.POST);

                    
                    requestCuenta.AddParameter("nombre", txtBox_Nombre.Text);
                    requestCuenta.AddParameter("apellidos", txtBox_Apellidos.Text);
                    requestCuenta.AddParameter("email", txtBox_Correo.Text);
                    requestCuenta.AddParameter("telefono", txtBox_Telefono.Text);
                    requestCuenta.AddParameter("genero", cb_Genero.SelectedValue.ToString());

                    //var responseCuenta = client.Execute(requestCuenta);

                    var requestUsuario = new RestRequest("registerUser", Method.POST);

                    requestUsuario.AddParameter("username", txtBox_Usuario.Text);
                    requestUsuario.AddParameter("password", txt_Password.Password);


                    var responseUsuario = client.Execute(requestUsuario);


                    if (responseUsuario.IsSuccessful)
                    {

                        MessageBox.Show("USUARIO REGISTRADO");

                        Login nuevoLogin = new Login();
                        nuevoLogin.Show();
                        this.Close();
                    }
                    else
                    {
                        Console.WriteLine("FALLO: " + responseUsuario.Content);
                    }
                    
                }
                else
                {
                    MessageBox.Show("Las contraseñas no coinciden");
                }
            }
            else
            {
                MessageBox.Show("Verifique los campos");
            }
        }

        private void btn_IniciarSesion_Click(object sender, RoutedEventArgs e)
        {
            Login login = new Login();
            login.Show();
            this.Close();
        }
    }
}
