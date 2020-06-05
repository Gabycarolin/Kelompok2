package com.example.futsalbismillah;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;

public class Preferences {
    static final String KEY_USERNAME_SEDANG_LOGIN = "Username_logged_in";
    static final String KEY_STATUS_SEDANG_LOGIN = "Status_logged_in";
    static final String NAMA = "nama";
    static final String ALAMAT = "alamat";
    static final String TELEPON = "telepon";
    static final String EMAIL ="email";
    static final String PASSWORD = "password";
    static final String ID = "id";

    private static SharedPreferences getSharedPreference(Context context){
        return PreferenceManager.getDefaultSharedPreferences(context);
    }

    public static void setKeyUsernameSedangLogin(Context context, String username_cust){
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(KEY_USERNAME_SEDANG_LOGIN, username_cust);
        editor.apply();
    }

    public static String getKeyUsernameSedangLogin(Context context){
        return getSharedPreference(context).getString(KEY_USERNAME_SEDANG_LOGIN, "");
    }

    public static void setNama(Context context, String nama_cust){
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(NAMA, nama_cust);
        editor.apply();
    }

    public static String getNama (Context context){
        return getSharedPreference(context).getString(NAMA, "");
    }

    public static void setAlamat(Context context, String alamat_cust){
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(ALAMAT, alamat_cust);
        editor.apply();
    }

    public static String getAlamat (Context context){
        return getSharedPreference(context).getString(ALAMAT, "");
    }

    public static void setTelepon(Context context, String telp_cust){
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(TELEPON, telp_cust);
        editor.apply();
    }

    public static String getTelepon (Context context){
        return getSharedPreference(context).getString(TELEPON, "");
    }

    public static void setEmail(Context context, String email_cust){
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(EMAIL, email_cust);
        editor.apply();
    }

    public static String getEmail (Context context){
        return getSharedPreference(context).getString(EMAIL, "");
    }

    public static void setPassword(Context context, String password_cust){
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(PASSWORD, password_cust);
        editor.apply();
    }

    public static String getPassword (Context context){
        return getSharedPreference(context).getString(PASSWORD, "");
    }


    public static void clearLoggedInUser(Context context){
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.remove(KEY_USERNAME_SEDANG_LOGIN);
        editor.remove(KEY_STATUS_SEDANG_LOGIN);
        editor.apply();
    }

    public static void setId(Context context, String id_cust){
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(ID, id_cust);
        editor.apply();
    }

    public static String getId(Context context ) {
        return getSharedPreference(context).getString(ID, "");
    }


}
